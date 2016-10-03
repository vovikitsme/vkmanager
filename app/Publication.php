<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Publication
 *
 * @property integer $id
 * @property string $groupName
 * @property string $links
 * @property string $categories
 * @property integer $subscribers
 * @property integer $reachingYourAudience
 * @property integer $unicVisitors
 * @property float $price
 * @property float $priceWithDiscount
 * @property string $requisitesPurse
 * @property string $requisites
 * @property string $dateWhenPostWasPublished
 * @property string $dateWhenPostWasPublishedTextFormat
 * @property string $numberNamePost
 * @property string $screenshot
 * @property integer $numberOfPost
 * @property string $canWeComment
 * @property integer $reposts
 * @property integer $likes
 * @property string $statusForCurrentPublications
 * @property string $comments
 * @property string $nameAndSurname
 * @property string $adminContact
 * @property string $answersFromTheAdvertisers
 * @property string $idPostOnOurAdvertisingPlatform
 * @property string $linksToFotoOrPostForMyAdvert
 * @property string $idPostOnAdvertisingPlatform
 * @property string $statusForPayment
 * @property string $colors
 * @property string $slug
 * @property integer $category_id
 * @property string $nameOfGoalForCurrentMonth
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereGroupName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereLinks($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereCategories($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereSubscribers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereReachingYourAudience($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereUnicVisitors($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication wherePriceWithDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereRequisitesPurse($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereRequisites($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereDateWhenPostWasPublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereDateWhenPostWasPublishedTextFormat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereNumberNamePost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereScreenshot($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereNumberOfPost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereCanWeComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereReposts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereLikes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereStatusForCurrentPublications($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereComments($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereNameAndSurname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereAdminContact($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereAnswersFromTheAdvertisers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereIdPostOnOurAdvertisingPlatform($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereLinksToFotoOrPostForMyAdvert($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereIdPostOnAdvertisingPlatform($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereStatusForPayment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereColors($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereNameOfGoalForCurrentMonth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $image
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $commentsy
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereImage($value)
 */
class Publication extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function commentsy()
    {
        return $this->hasMany('App\Comment');
    }
}
