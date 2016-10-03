<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mews\Purifier\Facades\Purifier; // нужен для того, чтобы в Б.Д. попадал нормальный текст и возможность её грохнуть, была минимальна
use Session;
use Jenssegers\Date\Date;
use App\Publication;
use App\Tag;
use App\Category;
use Image;
use Storage;


class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Date::setLocale('ru');
        $publications = Publication::all();
        return view('publications.index')->withPublications($publications);//название withPublications имеет приямую связь с index, где делаем foreach
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('publications.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'groupName' =>'required|max:255',
            'category_id' =>'required|integer',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'featured_image' => 'sometimes|image'
        ));

        $publication = new Publication;

        $publication->groupName = $request->groupName;
        $publication->links = $request->links;
        $publication->category_id = $request->category_id;
        $publication->priceWithDiscount = $request->priceWithDiscount;
        $publication->price = $request->price;
        $publication->numberNamePost = $request->numberNamePost;
        $publication->nameOfGoalForCurrentMonth = $request->nameOfGoalForCurrentMonth;
        $publication->nameAndSurname = $request->nameAndSurname;
        $publication->adminContact = $request->adminContact;
        $publication->requisites = Purifier::clean($request->requisites); // для защиты и чистки
        $publication->dateWhenPostWasPublishedTextFormat = $request->dateWhenPostWasPublishedTextFormat;
        $publication->slug = $request->slug;

        //save our image

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();//если поменять формат, то $image->encode('png');
            //$location = storage_path('/app/publications');// если в определенную папку хотим сохранить файл
            $location = public_path('images/' . $filename);// сохраняем файл в публичную папку
            Image::make($image)->resize(800,400)->save($location);
            $publication->image = $filename;
        }

        $publication->save();

        $publication->tags()->sync($request->tags, false); //это связано с тем, что тэги храняться в массиве select2 и чтобы синхронизовать созданные теги со статьей


        Session::flash('success',' Группа была успешно создана и сохранена!!!');

        return redirect()->route('publications.show', $publication->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Date::setLocale('ru');// Относится к конвектору времени
        $publication = Publication::find($id);//artisan ide-helper:models -W (заставляет появиться новые команды)
        //return view('publications.show')->with('publication',$publication);
        return view('publications.show')->withPublication($publication);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $publication = Publication::find($id);
        Date::setLocale('ru');
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('publications.edit')->withPublication($publication)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $publication = Publication::find($id);


 /*       if($request->input('slug')== $publication->slug) {
            $this->validate($request, array(
                'groupName' =>'required|max:255'
            ));
        } else {*/

            $this->validate($request, array(
                'groupName' =>'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:publications,slug,$id",// если надо использовать переменную, то обходимо ставить " - двойные кавычки
                'featured_image' => 'image'
            ));

        $publication = Publication::find($id);
        $publication->groupName = $request->input('groupName');
        $publication->links = $request->input('links');
        //$publication->categories = $request->input('categories');
        $publication->category_id = $request->input('category_id');
        $publication->subscribers = $request->input('subscribers');
        $publication->reachingYourAudience = $request->input('reachingYourAudience');
        $publication->unicVisitors = $request->input('unicVisitors');
        $publication->priceWithDiscount= $request->input('priceWithDiscount');
        $publication->price = $request->input('price');
        $publication->requisites = Purifier::clean($request->input('requisites'));
        $publication->dateWhenPostWasPublishedTextFormat = $request->input('dateWhenPostWasPublishedTextFormat');
        $publication->slug = $request->input('slug');

        if($request->hasFile('featured_image')) {

            // add the new photo
            $image = $request->file('featured_image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();//если поменять формат, то $image->encode('png');
            //$location = storage_path('/app/publications');// если в определенную папку хотим сохранить файл
            $location = public_path('images/' . $filename);// сохраняем файл в публичную папку
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $publication->image;
            // update the database
            $publication->image = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }

        $publication->save();

        if (isset($request->tags)) {
            $publication -> tags() ->sync($request->tags);
        } else {
            $publication->tags()->sync(array());
        }

        Session::flash('success',' Группа была успешно обновлена!!!');

        return redirect()->route('publications.show',$publication->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::find($id);
        $publication->tags()->detach();
        Storage::delete($publication->image);
        $publication->delete();
        Session::flash('success', ' Пост был успешно удален.');
        return redirect()->route('publications.index');
    }
}
