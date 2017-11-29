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
				<span class="tm--gamma t--caps">Abraham&nbsp;Taherivand</span><br>Geschäftsführender&nbsp;Vorstand
			<figcaption>
		</figure>
	</section>
	<section class="fields sc--lightblue">
		Handlungsfelder
	</section>
	<section class="cta-bar sc--lightorange">
		<div class="limit--20 center-column cp--v1-25 cta-buttons">
			<a href="#" class="cta-button cp--0-5 cm--1">
				<div class="tm--gamma t--caps t--strong">Werde Mitglied bei</div>
				<div class="tm--delta">Wikimedia Deutschland</div>
			</a>
			<a href="#" class="cta-button cp--0-5 cm--1">
				<div class="tm--gamma t--caps t--strong">Spende für</div>
				<div class="tm--delta">Freies Wissen</div>
			</a>
		</div>
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

					<article class="news-slider__slide next is-wm-type">
						<div class="news-slider__cover limit--5">
							<?= $this->assets->image('/app/img/dummy.jpg') ?>
						</div>
						<div class="news-slider__content limit--8 cp--0-5">
							<h1 class="news-slider__type tm--alpha t--caps t--strong">Projekte</h1>

							<p class="tm--alpha t--strong">
								<!--lorem-->Ultrices posuere cubilia Curae; Vestibulum hendrerit malesuada odio. Fusce ut elit ut augue sollicitudin blandit. Phasellus volutpat lorem. Duis non pede.<!--/lorem-->
							</p>
							<p class="tm--beta">
								<!--lorem-->Eu, dui. Quisque dignissim consequat nisl. Pellentesque porta augue in diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat. Suspendisse.<!--/lorem-->
							</p>
							<div>
								<?= $this->html->link('Zu diesem Projekt', '#', [
									'class' => 'link--black ts--alpha t--strong'
								]) ?>
							</div>
						</div>
					</article>

					<article class="news-slider__slide is-wm-type">
						<div class="news-slider__cover limit--5">
							<?= $this->assets->image('/app/img/dummy.jpg') ?>
						</div>
						<div class="news-slider__content limit--8 cp--0-5">
							<h1 class="news-slider__type tm--alpha t--caps t--strong">Projekte</h1>

							<p class="tm--alpha t--strong">
								<!--lorem-->Ultrices posuere cubilia Curae; Vestibulum hendrerit malesuada odio. Fusce ut elit ut augue sollicitudin blandit. Phasellus volutpat lorem. Duis non pede.<!--/lorem-->
							</p>
							<p class="tm--beta">
								<!--lorem-->Eu, dui. Quisque dignissim consequat nisl. Pellentesque porta augue in diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat. Suspendisse.<!--/lorem-->
							</p>
							<div>
								<?= $this->html->link('Zu diesem Projekt', '#', [
									'class' => 'link--black ts--alpha t--strong'
								]) ?>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>

	<section class="team limit--14 cp--t1-25 cp--b4 center-column sc--white">
		<h1 class="tl--beta t--strong h--alpha">Unser Präsidium</h1>
		<div class="team__inner">
			<ul class="team__list limit--5 tm--gamma t--caps">
				<li><span class="team__member active">Tim Moritz Hector</span></li>
				<li><span class="team__member">Sabria David</span></li>
				<li><span class="team__member">Kurt Jansson</span></li>
				<li><span class="team__member">Sebastian Moleski</span></li>
				<li><span class="team__member">Harald Krichel</span></li>
				<li><span class="team__member">Lukas Mezger</span></li>
				<li><span class="team__member">Johanna Niesyto</span></li>
				<li><span class="team__member">Name Nachname</span></li>
				<li><span class="team__member">Name Nachname</span></li>
			</ul>
			<figure class="team__image limit--5">
				<img src="<?= $this->assets->url('/app/img/testbild_mission.jpg') ?>">
			</figure>
			<div class="team__text limit--5">
				<h2 class="tm--alpha t--strong">Stellvertretende Vorsitzende</h2>
				<p class="tm--beta">
					&raquo;Ich forsche und berate zu den Auswirkungen und Potentialen des digitalen
					Wandels. Wikipedia fasziniert mich vor allem als offenes System und diskursives
					Werk, als Modell einer Schriftkultur der Zukunft. Ich bin Mitgründerin des Slow
					Media Instituts	und Mitautorin vom Slow Media Manifest und der Declaration of
					Liquid Culture.&laquo;
				</p>
				<a class="team__mail ts--alpha" href="mailto:sabria.david@wikimedia.de">
					<span class="ts--beta">E-Mail:&nbsp;</span>sabria.david@wikimedia.de
				</a>
			</div>
		</div>
	</section>
</main>