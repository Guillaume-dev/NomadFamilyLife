@extends('layouts.app')

@section('content')

<section id="nomad_family">
		<a href="#" class="video-audio">
            <i class="fa volume fa-volume-up"></i>
        </a>
		<video class="intro-video" autoplay="">
			<source src="{{ URL::asset("video/travel-video-demo.mp4") }}" type="video/mp4">
        </video>
        <div>
            <div>
                    <h2 class="ml3">Nomad Family Life</h2>
            </div>
            <div>
                    <p class="ml12">Ou notre vie de famille nomade</p>''
            </div>
        </div>
        <div>
            <a href="#events">
                <button class="text-center button_home btn btn-outline-primary">Voyager</button>
            </a>
        </div>
</section>

<div class="container">
    {{-- Section derniers Articles --}}
    <section id="events">
        <h1>Les derniers articles</h1>
        <p>Ici vous trouverez toujours nos nouveaux articles et reportage</p>

        <div class="row">
            @foreach ($articles as $article)
                <article class="col-md-6 col-lg-3">
                    <div class="event-wrapper">
                        <div class="event-tag">
                                <a href="{{  url($article->path()) }}"><h2>{{ $article->title }}</h2></a>
                            <p>écrit le {{ date('d-m-Y', strtotime($article->created_at)) }}</p>
                        </div>

                        <img class="event-thumbnail thumbnail" src="{{ $article->url }}" alt="">

                    </div>
                    <p class="event-intro">{{ str_limit($article->content, $limit = 350, $end = ' ...') }}<br><a href="{{  url($article->path()) }}">Lire la suite ...</a></p>
                </article>
            @endforeach
        </div>
    </section>
    {{-- Section Newsletter --}}
</div>
<section id="newsletter" class="">
        <div class="container container-newsletter">
            <h1 class="h1-newsletter"><strong>Inscrivez-vous</strong> à notre newsletter</h1>
            {{ csrf_field() }}
            <form class="form-newsletter" action="{{ url('/subscribe_newsletter') }}" method="POST">
                <input type="email" name="email" id="email" placeholder="example@example.com" />
                <input type="submit" name="submit" value="inscription">
            </form>
        </div>
    </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>


// Wrap every letter in a span
var textWrapper = document.querySelector('.ml3');
textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

anime.timeline({loop: false})
  .add({
    targets: '.ml3 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 2250,
    delay: function(el, i) {
      return 1000 * (i+1)
    }
  })

  // Wrap every letter in a span
var textWrapper = document.querySelector('.ml12');
textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

anime.timeline({loop: false})
  .add({
    targets: '.ml12 .letter',
    translateX: [40,0],
    translateZ: 0,
    opacity: [0,1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: function(el, i) {
      return 18000 + 100 * i;
    }
  })

 //Pour stopper le son dans la vidéo avec prise en charges des differents paramètres
var video = function ($) {

var video = $('.intro-video');

var pause = function () {

    var isVideoVisible = video.visible();
    (isVideoVisible == true) ? video.get(0).play() : video.get(0).pause();

}

var controlAudio = function () {

    var audioController = $('.video-audio');
    var volume = $('.video-audio .volume');
    var isAudioOn = volume.hasClass('fa-volume-up');
    if (isAudioOn) {

        volume.removeClass('fa-volume-up');
        volume.addClass('fa-volume-off');
        video.prop('muted', true);

    } else {

        volume.removeClass('fa-volume-off');
        volume.addClass('fa-volume-up');
        video.prop('muted', false);

    }
    console.log(isAudioOn);
};

//attach event handler on body scroll
$(window).on('scroll', pause);

$(".video-audio").on('click', controlAudio);

}(jQuery);
</script>
@endsection
