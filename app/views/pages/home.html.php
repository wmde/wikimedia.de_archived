<?php

use base_core\base\Sites;

// The Sites class gives us access to Site objects, where each has a title and a FQDN.
// Each app can host multiple Sites if needed.
$site = Sites::current($this->_request);

// Usually we automatically add the application's name to the title so `$this->title('Lorem')`
// would result in `Lorem - App`. The home page is treated a little different, as to allowing
// claims and full control over the title. Thus `$this->title('App: Lorem')` will result in
// `App: Lorem`.
//
// @see app/views/layouts/default.html.php
// @see base_core\extensions\helper\Seo::title()
//
$this->title($site->title());

?>
<main id="main" class="home">
	<section class="illu-hero sc--green">
		<div class="illu-hero__inner limit--14 cp--h1 center-column">
			<div class="illu-hero__text tl--alpha limit--7">
				Lorem: Unsere <span class="tl--beta t--strong">Vision</span> ist eine Welt, in der
				jeder Mensch am Wissen der Menschheit teilhaben, es nutzen und mehren
				kann.
			</div>
		</div>
	</section>
	<section class="mission limit--14 cp--v2 center-column sc--white">
		<h1 class="mission__headline tl--beta t--strong h--alpha">Mission</h1>
		<div class="mission__text tl--gamma limit--6">
			Wir setzen uns für Freies Wissen ein, um die Chancengleichheit beim Zugang zu Wissen
			und Bildung zu fördern.
		</div>
		<figure class="mission__image limit--5">
			<img src="<?= $this->assets->url('/app/img/testbild_mission.jpg') ?>">
			<figcaption class="mission__caption">
				<span class="t--caps">Abraham&nbsp;Taherivand</span><br>Geschäftsführender&nbsp;Vorstand
			<figcaption>
		</figure>
	</section>
	<section class="fields sc--lightblue">
		Handlungsfelder
	</section>
	<section class="cta-bar sc--orange">
		<a href="#" class="cta-button">
			Lorem
		</a>
		<a href="#" class="cta-button">
			Ipsum
		</a>
	</section>
	<section class="news news-slider-wrapper sc--lightgray">
		<div class="limit--14 center-column cp--h1 cp--v2">
			<h1 class="tl--beta t--strong h--alpha">Aktuelles</h1>
			<div class="news-slider">
				<div class="news-slider__counter tm--gamma t--strong">
					?/?
				</div>
				<a href="#next-slide" class="news-slider__next"></a>
				<div class="news-slider__stage">
					<article class="news-slider__slide active is-wm-type">

						<div class="news-slider__cover limit--5">
							<?= $this->assets->image('/app/img/dummy.jpg') ?>
						</div>

						<div class="news-slider__content limit--8 cp--0-5">
							<h1 class="news-slider__type tm--alpha t--caps t--strong">Projekte</h1>

							<p class="tm--alpha t--strong">
								<!--lorem-->Ultrices posuere cubilia Curae; Vestibulum hendrerit malesuada odio. Fusce ut elit ut augue sollicitudin blandit. Phasellus volutpat lorem. Duis non pede.<!--/lorem-->
								<!--lorem-->Ultrices posuere cubilia Curae; Vestibulum hendrerit malesuada odio. Fusce ut elit ut augue sollicitudin blandit. Phasellus volutpat lorem. Duis non pede.<!--/lorem-->
								<!--lorem-->Ultrices posuere cubilia Curae; Vestibulum hendrerit malesuada odio. Fusce ut elit ut augue sollicitudin blandit. Phasellus volutpat lorem. Duis non pede.<!--/lorem-->
							</p>
							<p class="tm--beta">
								<!--lorem-->Eu, dui. Quisque dignissim consequat nisl. Pellentesque porta augue in diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat. Suspendisse.<!--/lorem-->
								<!--lorem-->Eu, dui. Quisque dignissim consequat nisl. Pellentesque porta augue in diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat. Suspendisse.<!--/lorem-->
								<!--lorem-->Eu, dui. Quisque dignissim consequat nisl. Pellentesque porta augue in diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat. Suspendisse.<!--/lorem-->
								<!--lorem-->Eu, dui. Quisque dignissim consequat nisl. Pellentesque porta augue in diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat. Suspendisse.<!--/lorem-->
							</p>
							<div>
								<?= $this->html->link('Zu diesem Projekt', '#', [
									'class' => 'link--black ts--alpha t--strong'
								]) ?>
							</div>
						</div>
					</article>
					<?php for ($i = 0; $i < 4; $i++): ?>
					<?php
	$class = ['next is-wm-type', 'is-member-type', 'is-iniative-type', 'is-member-type'][$i];
?>
					<article class="news-slider__slide <?= $class ?>">

						<div class="news-slider__cover limit--5">
							<?= $this->assets->image('/app/img/dummy.jpg') ?>
						</div>

						<div class="news-slider__content limit--8 cp--0-5">
							<h1 class="news-slider__type tm--alpha t--caps t--strong">Projekte</h1>

							<p class="news-slider__teaser tm--alpha t--strong">
								<!--lorem-->Ultrices posuere cubilia Curae; Vestibulum hendrerit malesuada odio. Fusce ut elit ut augue sollicitudin blandit. Phasellus volutpat lorem. Duis non pede.<!--/lorem-->
							</p>
							<p class="news-slider__text tm--beta">
								<!--lorem-->Eu, dui. Quisque dignissim consequat nisl. Pellentesque porta augue in diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat. Suspendisse.<!--/lorem-->
							</p>
							<div class="news-slider__actions">
								<?= $this->html->link('Zum Projekt', '#', [
									'class' => 'news-slider__action link--black ts--alpha t--strong'
								]) ?>
							</div>
						</div>
					</article>
					<?php endfor ?>
				</div>
			</div>
		</div>
	</section>
	<section class="team sc--white">
		Unser Präsidium
	</section>
</main>