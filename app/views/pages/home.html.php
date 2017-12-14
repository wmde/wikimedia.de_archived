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

$text  = 'Wikipedia ist eine der zehn beliebtesten Websites der Welt. ';
$text .= 'Ihre Inhalte und die aller anderen Wikimedia-Projekte werden von Freiwilligen ';
$text .= 'erstellt, verbessert und verbreitet. Wikimedia Deutschland unterstützt ihre Arbeit ';
$text .= 'vor allem an Wikipedia, Wikimedia Commons, Wikidata, aber auch den kleineren Projekten.';
$this->seo->set('description', $text);

?>
<main id="main" class="home">
	<section class="illu-hero sc--lightgreen-gradient">
		<div class="illu-hero__green"></div>
		<div class="illu-hero__wrapper">
			<div class="illu-hero__inner limit--20 cp--h1 center-column">
				<div class="illu-hero__cube"></div>
			</div>
		</div>
		<div class="illu-hero__wrapper--no-overflow">
			<div class="illu-hero__blue"></div>
		</div>
		<div class="illu-hero__inner limit--20 cp--h1 center-column">
			<div class="illu-hero__text tl--alpha">
				Unsere <span class="tl--beta t--strong">Vision</span> ist eine Welt, in der
				jeder Mensch am Wissen der Mensch&shy;heit teilhaben, es nutzen und mehren
				kann.
			</div>
		</div>
		<div class="illu-hero__lower sc--white">
			<div class="illu-hero__inner limit--20 cp--h1 center-column">
				<?= $this->references->cite($references['hero'], [
					'style' => 'long',
					'class' => 'illu-hero__ref ts--beta'
				]) ?>
			</div>
		</div>
	</section>

	<section class="mission sc--white">
		<div class="mission__inner limit--16 cp--h1 cp--v2 center-column">
			<h1 class="mission__headline tl--beta t--strong">Mission</h1>
			<div class="mission__text tl--gamma cp--0-5">
				Wir setzen uns für Freies Wissen ein, um die Chancen&shy;gleichheit beim Zu&shy;gang zu Wissen
				und Bildung zu fördern.
			</div>
			<figure class="fig mission__image cm--l2 cm--t0-5">
				<div>
				<?= $this->assets->image('/app/img/testbild_mission.jpg', [
					'class' => 'fig__media',
					'alt' => 'Portrait von Abraham Taherivand'
				]) ?>
				<?= $this->references->cite($references['mission'], [
					'class' => 'fig__ref ts--beta',
					'style' => 'short'
				]) ?>
				</div>
				<figcaption class="fig__caption mission__caption cm--l0-25">
					<div class="tm--gamma t--caps">Abraham&nbsp;Taherivand</div>
					<div class="tm--gamma">Geschäftsführender&nbsp;Vorstand</div>
				<figcaption>
			</figure>
		</div>
	</section>
	<section class="fields is-active-support">
		<div class="sc--lightblue fields--grid">
			<div class="limit--16 center-column cp--h1 cp--t1-25">
				<h1 class="tl--beta t--strong">Handlungsfelder</h1>
			</div>
			<div class="field-buttons limit--16 center-column cp--h0-5 cp--t0-5 cp--b1-75">
				<a
					href="#fields-support"
					class="field-button field-button--alpha corners corners--green cm--0-5 cp--0-5"
					aria-controls="fields-blurb"
					role="button"
				>
					<div class="field-button__inner tl--gamma">
						Freiwillige unterstützen, gewinnen und halten
					</div>
				</a>
				<a
					href="#fields-dev"
					class="field-button field-button--beta corners corners--green cm--0-5 cp--0-5"
					aria-controls="fields-blurb"
					role="button"
				>
					<div class="field-button__inner tl--gamma">
						Software entwickeln
					</div>
				</a>
				<a
					href="#fields-know"
					class="field-button field-button--gamma corners corners--green cm--0-5 cp--0-5"
					aria-controls="fields-blurb"
					role="button"
				>
					<div class="field-button__inner tl--gamma">
						Rahmen&shy;bedingungen für Freies Wissen stärken
					</div>
				</a>
			</div>
		</div>
		<div class="sc--white">
			<div class="fields__blurb-wrapper limit--16 center-column cp--b1 cp--h1">
				<div id="fields-blurb" class="fields__blurb limit--8" aria-live="polite">
					<div class="fields__blurb-top"></div>
					<div class="fields__blurb-lower cp--0-5 tm--beta">
						<article id="fields-support" class="fields__text">
							<p>
								Die freie Enzyklopädie Wikipedia wird von ehrenamtlichen
								Autorinnen und Autoren geschrieben. Da es keine hauptamtliche Redaktion gibt, lebt
								die Wikipedia von der Mitarbeit möglichst vieler Menschen. Aber die Zahl der aktiven
								Autorinnen und Autoren geht zurück. Wenn sich auch in Zukunft immer weniger Menschen
								engagieren, könnten Artikel nicht mehr aktuell gehalten werden – oder keine neuen
								entstehen.
							</p>
							<p>
								Wir setzen uns deshalb dafür ein, dass die Wikipedia auch in
								Zukunft verlässlich, umfassend und aktuell ist. Wir machen Menschen darauf aufmerksam,
								dass man sich an der Wikipedia beteiligen kann und bieten Interessierten Hilfe und
								Einstiegsmöglichkeiten.
							</p>
							<p>
								Die bereits bestehenden Autorinnen und Autoren
								bestärken wir in ihrem Engagement und stehen ihnen zur Seite, wenn es darum
								geht, ihre Pläne in die Tat umzusetzen. Wir vergeben zum Beispiel Stipendien,
								helfen bei der Durchführung von Workshops und Wettbewerben oder bieten technische
								Unterstützung.
							</p>
						</article>
						<article id="fields-dev" class="fields__text" hidden>
							<p>
								Wenn wir heute etwas wissen wollen, schauen wir einfach im Internet nach. Anders als bei
								einem gedruckten Lexikon brauchen wir für das Internet Software, damit dieses Wissen
								überhaupt vernünftig angezeigt werden kann. Aber die digitale Umgebung entwickelt sich
								rasant weiter.
							</p>
							<p>
								Damit die Wikipedia auch in Zukunft benutzerfreundlich und für alle digital zugänglich
								bleibt, bauen wir MediaWiki, die Software hinter der Wikipedia, immer weiter aus.
							</p>
							<p>
								Außerdem entwickeln wir unsere freie Datenbank Wikidata, die Menschen auf der ganzen
								Welt zum Beispiel an die fast 300 verschiedenen Sprachversionen von Wikipedia anbinden
								können. Die Software hinter Wikidata ist so konzipiert, dass sie jederzeit und von allen
								Interessierten auch außerhalb der Wikimedia-Welt Zugang zu unserer Datenbank bietet.
							</p>
						</article>
						<article id="fields-know" class="fields__text" hidden>
							<p>
								Die Welt ist reich an Kulturgütern wie Büchern, Gemälden oder wissenschaftlichen
								Arbeiten. Sie können von der Öffentlichkeit aber meist nur angeschaut und nicht genutzt
								werden. Selbst wenn sie in z. B. einem Museum ausgestellt sind, darf man sie oft nicht
								fotografieren und verwenden.
							</p>
							<p>
								Öffentliche Güter gehören aus unserer Sicht in die Öffentlichkeit. Wir arbeiten daher mit
								Bildungs-, Wissenschafts- und Kulturinstitutionen zusammen und befähigen sie, ihre Inhalte
								unter eine freie Lizenz zu stellen. Damit alle diese Schätze frei weiterverwendet werden
								können – etwa für Unterrichtsmaterialien oder einen Blog.
							</p>
							<p>
								Dafür braucht es einen geeigneten rechtlichen Rahmen. Wir wollen erreichen, dass Menschen
								so leicht wie möglich ihr Wissen teilen können und es gemeinschaftlich genutzt werden
								kann. Wir setzen uns aus diesem Grund für ein zeitgemäßes Urheberrecht ein, dass die
								Möglichkeiten des Internets nutzt, um Wissen zu verbreiten und zu vermehren.
							</p>
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="cta" class="cta-bar sc--lightorange">
		<div class="limit--16 center-column cp--v1 cp--h0-5 cta-buttons">
			<a
				href="https://spenden.wikimedia.de/apply-for-membership?piwik_campaign=mgl_wm.de&piwik_kwd=mgl_150113&type=true"
				class="cta-button cp--0-5 cm--0-5 corners corners--orange"
			>
				<div class="cta-button__inner">
					<div class="tm--gamma t--caps t--strong">Werde Mitglied bei</div>
					<div class="tm--delta">Wikimedia Deutschland</div>
				</div>
			</a>
			<a
				href="https://spenden.wikimedia.de/"
				class="cta-button cp--0-5 cm--0-5 corners corners--orange"
			>
				<div class="cta-button__inner">
					<div class="tm--gamma t--caps t--strong">Spende für</div>
					<div class="tm--delta">Freies Wissen</div>
				</div>
			</a>
		</div>
	</section>

	<section class="news sc--lightgray">
		<?php
			$linkTitle = function($item) {
				$sourceMatch = [
					'#(^job\.wikimedia|/wiki/job)#' => 'Zur Jobseite',
					'#vimeo.com#' => 'Zum Vimeo Channel'
				];
				foreach ($sourceMatch as $regex => $title) {
					if (preg_match($regex, $item->source)) {
						return $title;
					}
				}
				if ($item->hasTags(['initiative'])) {
					return 'Zu dieser Initiative';
				}
				if ($item->hasTags(['project'])) {
					return 'Zu diesem Projekt';
				}
				return 'Zur Webseite';
			};
		?>
		<div class="news__inner limit--16 center-column cp--h1 cp--t2">
			<h1 class="tl--beta t--strong">Aktuelles</h1>

			<?php $i = 0; foreach ($posts as $item): ?>
			<?php
				// Allows to set initial state of the slider, so we don't have to wait for
				// JavaScript to be loaded, to display the initial state.
				$isFirst = $i === 0;

				$classes = array_map(function($v) {
					return "tagged--{$v}";
				}, $item->tags(['serialized' => false]));

				$i++;
			?>
			<article
				<?php if ($isFirst): ?>
					id="news-stage"
					class="news__post cp--b2"
					aria-live="polite"
				<?php else: ?>
					class="news__post cp--b2" hidden
				<?php endif ?>
			>
				<div class="news__box <?php echo implode(' ', $classes) ?> limit--8 cm--l5 cp--v0-5 cp--r0-5 cp--l2-5 sc--white">
					<h1 class="news__title tm--gamma t--caps">
					<?php
						if ($item->hasTags(['wm'])) {
							echo 'Wikimedia';
						} elseif ($item->hasTags(['initiative']))  {
							echo 'Initiative';
						} elseif ($item->hasTags(['member']))  {
							echo 'Mitglieder';
						} elseif ($item->hasTags(['project']))  {
							echo 'Projekt';
						} else {
							echo $item->title;
						}
					?>
					</h1>
					<div class="news__image<?php if ($isFirst): ?> active<?php endif ?>" >
						<?php if ($cover = $item->cover()): ?>
						<figure class="fig">
							<?= $this->media->image($cover->version('fix20'), [
								'class' => 'fig__media',
								'alt' => $cover->title
							]) ?>
							<?php if ($ref = $cover->reference()): ?>
								<?= $this->references->cite($ref, [
									'class' => 'fig__ref ts--beta',
									'style' => 'short'
								]) ?>
							<?php endif ?>
						</figure>
					<?php endif ?>
					</div>

					<div class="news__teaser tm--alpha"><?php echo $item->teaser ?></div>
					<div class="news__text tm--beta cm--b1"><?php echo $item->body ?></div>

					<?= $this->html->link($linkTitle($item), $item->source ?: '#', [
						'hidden' => !$item->source && $isFirst,
						'class' => 'news__link link--black ts--alpha',
						'target' => 'new'
					]) ?>
				</div>
			</article>
			<?php endforeach ?>
		</div>
	</section>

	<section class="team sc--white">
		<div class="team__inner limit--16 cp--h1 cp--t1-25 center-column">
			<h1 class="tl--beta t--strong">Unser Präsidium</h1>

			<?php $i = 0; foreach ($teamMembers as $item): ?>
			<?php
				// Allows to set initial state of the slider, so we don't have to wait for
				// JavaScript to be loaded, to display the initial state.
				$isFirst = $i === 0;
				$i++;
			?>
			<article
				<?php if ($isFirst): ?>
					id="member-stage"
					role="region"
					aria-live="polite"
				<?php endif ?>
				class="member cp--b4 clearfix"
			>
				<h1 class="member__name" hidden><?= $item->name ?> </h1>
				<div class="member__image">
					<?php if ($cover = $item->portrait()): ?>
						<figure class="fig">
							<?= $this->media->image($cover->version('fix20'), [
								'class' => 'fig__media',
								'alt' => "Portrait von {$item->name}"
							]) ?>
							<?php if ($ref = $cover->reference()): ?>
								<?= $this->references->cite($ref, [
									'class' => 'fig__ref ts--beta',
									'style' => 'short'
								]) ?>
							<?php endif ?>
						</figure>
					<?php endif ?>
				</div>
				<div class="member__info limit--5">
					<h2 class="member__role tm--alpha t--strong"><?= $item->position ?></h2>
					<div class="member__text tm--beta" ><?php echo $item->vita ?></div>

					<?php if ($item->email): ?>
					<a
						class="member__link ts--alpha"
						href="mailto:<?php echo $item->email ?>"
					>
						<span class="ts--beta">E-Mail:</span>
						<span class="member__mail"><?= $item->email ?></span>
					</a>
					<?php elseif ($isFirst): ?>
					<a class="member__link ts--alpha" href="#" hidden>
						<span class="ts--beta">E-Mail:</span>
						<span class="member__mail"></span>
					</a>
					<?php endif ?>
				</div>
			</article>
			<?php endforeach ?>
		</div>
	</section>
</main>