Нажмите Здесь, чтобы сбросить ВАШ Пароль: <br>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>