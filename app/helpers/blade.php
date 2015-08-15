<?php
//register custom macro for blade view :D

HTML::macro('Mdivider', function() {
	return "<div class=\"divider\"></div>";
});
HTML::macro('Micon', function($icon) {
	return "<i class=\"$icon prefix\"></i>";
});
                
Form::macro('Mlabel', function($name, $placeholder) {
	return Form::label($name, $placeholder, ['class' => 'active']);
});

Form::macro('Mtext', function($name, $placeholder = null) {
	return Form::text($name, null, array('placeholder' => $placeholder));
});

Form::macro('Msubmit', function($title) {
	return '
	<button class="btn waves-effect waves-light" type="submit" name="action">'.$title.
        '<i class="mdi-content-send right"></i>
    </button> ';
});

HTML::macro('actNav',function($url, $title, $icon =null) {
	$class = '';
	if ($url == Request::url()) {
		$class = 'active';
	}
	if ($icon) {
		$logo = '<i class="'.$icon.' left"></i>';
	} else {
		$logo = '';
	}
	return '<li class="'.$class.'"><a href="'.$url.'">'.$logo.' '.$title.'</a></li>';
});

HTML::macro('fab', function($route=null, $logo=null, $path=null) {
	if ($logo) {
		$icon = $logo;
	} else {
		$icon = 'mdi-content-add';
	}
	if ($path) {
		$url = $path;
	} else {
		$url = explode('.', Route::currentRouteName());
		array_pop($url);
		if (!$route) {
			array_push($url, 'create');
		} else {
			array_push($url, $route);
		}
		$url = implode('.', $url);
		$url = route($url);
	}
	return '
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a class="btn-floating btn-large red" href="'.$url.'"">
			<i class="large '.$icon.'"></i>
		</a>
	</div ';
});