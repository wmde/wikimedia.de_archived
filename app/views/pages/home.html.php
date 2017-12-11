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
	<section class="illu-hero sc--lightgreen">
		<div class="illu-hero__inner limit--14 cp--h1 center-column">
			<div class="illu-hero__text tl--alpha limit--7">
				Unsere <span class="tl--beta t--strong">Vision</span> ist eine Welt, in der
				jeder Mensch am Wissen der Menschheit teilhaben, es nutzen und mehren
				kann.
			</div>
		</div>
		<?= $this->references->cite($references['hero'], ['style' => 'long']) ?>
	</section>

	<section class="mission sc--white">
		<div class="mission__inner limit--16 cp--h1 cp--v2 center-column">
			<h1 class="mission__headline tl--beta t--strong">Mission</h1>
			<div class="mission__text tl--gamma cp--0-5">
				Wir setzen uns für Freies Wissen ein, um die Chancen&shy;gleichheit beim Zu&shy;gang zu Wissen
				und Bildung zu fördern.
			</div>
			<figure class="mission__image cm--l2 cm--t0-5">
				<?= $this->assets->image('/app/img/testbild_mission.jpg', [
					'alt' => 'Portrait von Abraham Taherivand'
				]) ?>
				<?= $this->references->cite($references['mission'], ['style' => 'short']) ?>
				<figcaption class="mission__caption cm--l0-5">
					<span class="tm--gamma t--caps">Abraham&nbsp;Taherivand</span><br>Geschäftsführender&nbsp;Vorstand
				<figcaption>
			</figure>
		</div>
	</section>
	<section class="fields is-active-support">
		<div class="sc--lightblue sc--grid">
			<div class="limit--16 center-column cp--h1 cp--t1-25">
				<h1 class="t--beta">Handlungsfelder</h1>
			</div>
			<div class="field-buttons limit--16 center-column cp--h0-5 cp--t0-5 cp--b1-75">
				<a href="#support" class="field-button field-button--alpha corners corners--green cm--0-5 cp--0-5">
					<div class="field-button__inner tl--gamma">
						Freiwillige unterstützen, gewinnen und halten
					</div>
				</a>
				<a href="#dev" class="field-button field-button--beta corners corners--green cm--0-5 cp--0-5">
					<div class="field-button__inner tl--gamma">
						Software entwickeln
					</div>
				</a>
				<a href="#know" class="field-button field-button--gamma corners corners--green cm--0-5 cp--0-5">
					<div class="field-button__inner tl--gamma">
						Rahmen&shy;be&shy;dingungen für Freies&nbsp;Wissen stärken
					</div>
				</a>
			</div>
		</div>
		<div class="sc--white">
			<div class="fields__blurb-wrapper limit--16 center-column cp--b1 cp--h1">
				<div class="fields__blurb limit--8">
					<div class="fields__blurb-top"></div>
					<div class="fields__blurb-lower cp--0-5 tm--beta">
						<article id="support" class="fields__text">
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
								Zukunft verlässlich, umfassend und aktuell ist. <strong>Wir machen Menschen darauf aufmerksam,
								dass man sich an der Wikipedia beteiligen kann</strong> und bieten Interessierten Hilfe und
								Einstiegsmöglichkeiten.
							</p>
							<p>
								<strong>Die bereits bestehenden Autorinnen und Autoren
								bestärken wir in ihrem Engagement</strong> und stehen ihnen zur Seite, wenn es darum
								geht, ihre Pläne in die Tat umzusetzen. Wir vergeben zum Beispiel Stipendien,
								helfen bei der Durchführung von Workshops und Wettbewerben oder bieten technische
								Unterstützung.
							</p>
						</article>
						<article id="dev" class="fields__text hide">
							<p>
								Wenn wir heute etwas wissen wollen, schauen wir einfach im Internet nach. Anders als bei
								einem gedruckten Lexikon brauchen wir für das Internet Software, damit dieses Wissen
								überhaupt vernünftig angezeigt werden kann. Aber die digitale Umgebung entwickelt sich
								rasant weiter.
							</p>
							<p>
								Damit die Wikipedia auch in Zukunft benutzerfreundlich und für alle digital zugänglich
								bleibt, bauen wir <strong>MediaWiki</strong>, die Software hinter der Wikipedia, immer weiter aus.
							</p>
							<p>
								Außerdem entwickeln wir unsere <strong>freie Datenbank Wikidata</strong>, die Menschen auf der ganzen
								Welt zum Beispiel an die fast 300 verschiedenen Sprachversionen von Wikipedia anbinden
								können. Die Software hinter Wikidata ist so konzipiert, dass sie jederzeit und von allen
								Interessierten auch außerhalb der Wikimedia-Welt Zugang zu unserer Datenbank bietet.
							</p>
						</article>
						<article id="know" class="fields__text hide">
							<p>
								Die Welt ist reich an Kulturgütern wie Büchern, Gemälden oder wissenschaftlichen
								Arbeiten. Sie können von der Öffentlichkeit aber meist nur angeschaut und nicht genutzt
								werden. Selbst wenn sie in z. B. einem Museum ausgestellt sind, darf man sie oft nicht
								fotografieren und verwenden.
							</p>
							<p>
								<strong>Öffentliche Güter gehören aus unserer Sicht in die Öffentlichkeit.</strong> Wir arbeiten daher mit
								Bildungs-, Wissenschafts- und Kulturinstitutionen zusammen und befähigen sie, ihre Inhalte
								unter eine freie Lizenz zu stellen. Damit alle diese Schätze frei weiterverwendet werden
								können – etwa für Unterrichtsmaterialien oder einen Blog.
							</p>
							<p>
								<strong>Dafür braucht es einen geeigneten rechtlichen Rahmen.</strong> Wir wollen erreichen, dass Menschen
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
					class="news__post cp--b2"
					id="counterHook"
				<?php else: ?>
					class="news__post cp--b2 hide"
				<?php endif ?>
			>
				<div
					class="news__box <?php echo implode(' ', $classes) ?> limit--8 cm--l5 cp--v0-5 cp--r0-5 cp--l2-5 sc--white"
					<?php if ($isFirst): ?>
						id="newsBox"
					<?php endif ?>
				>
					<h1
						class="news__title tm--gamma t--caps"
						<?php if ($isFirst): ?>
							id="newsTitle"
						<?php endif ?>
					>
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
					<div
						class="news__image<?php if ($isFirst): ?> news__image--active<?php endif ?>"
						<?php if ($cover = $item->cover()): ?>
							style="background-image: url(<?= $this->media->url($cover->version('fix20')) ?>);"
						<?php endif ?>
					></div>
					<div
						class="news__teaser tm--alpha"
						<?php if ($isFirst): ?>
							id="newsTeaser"
						<?php endif ?>
					>
						<?php echo $item->teaser ?>
					</div>
					<div
						class="news__text tm--beta cm--b1"
						<?php if ($isFirst): ?>
							id="newsText">
						<?php endif ?>
						<?php echo $item->body ?>
					</div>
					<?php if ($item->source): ?>
						<?= $this->html->link('Zu diesem Projekt', $item->source, [
							'class' => 'news__link link--black ts--alpha t--strong',
							'id' => $isFirst ? 'newsLink' : null,
							'target' => 'new'
						]) ?>
					<?php elseif ($isFirst): ?>
						<?= $this->html->link('Zu diesem Projekt', '#', [
							'class' => 'news__link link--black ts--alpha t--strong hide',
							'id' => 'newsLink',
							'target' => 'new'
						]) ?>
					<?php endif ?>
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
				class="member cp--b4 clearfix"
				<?php if ($isFirst): ?>
					id="teamStage"
				<?php endif ?>
			>
				<h1
					class="member__name hide"
					<?php if ($isFirst): ?>
						id="memberName"
					<?php endif ?>
				>
					<?= $item->name ?>
				</h1>
				<div
					class="member__image"
					<?php if ($isFirst): ?>
						id="memberImg"
					<?php endif ?>
				>
					<?php if ($cover = $item->portrait()): ?>
						<figure>
							<?= $this->media->image($cover->version('fix20'), [
								'alt' => $cover->title . $i
							]) ?>
							<?php if ($ref = $cover->reference()): ?>
								<?= $this->references->cite($ref) ?>
							<?php endif ?>
						</figure>
					<?php endif ?>
				</div>
				<div class="member__info limit--5">
					<h2
						class="member__role tm--alpha t--strong"
						<?php if ($isFirst): ?>
							id="memberRole"
						<?php endif ?>
					>
						<?= $item->position ?>
					</h2>
					<div
						class="member__text tm--beta"
						<?php if ($isFirst): ?>
							id="memberText"
						<?php endif ?>
					>
						<?php echo $item->vita ?>
					</div>

					<?php if ($item->source): ?>
						<?= $this->html->link('Zu diesem Projekt', $item->source, [
							'class' => 'news__link link--black ts--alpha t--strong',
							'id' => $isFirst ? 'newsLink' : null,
							'target' => 'new'
						]) ?>
					<?php elseif ($isFirst): ?>
						<?= $this->html->link('Zu diesem Projekt', '#', [
							'class' => 'news__link link--black ts--alpha t--strong hide',
							'id' => 'newsLink',
							'target' => 'new'
						]) ?>
					<?php endif ?>

					<?php if ($item->email): ?>
					<a
						class="member__mail ts--alpha"
						<?php if ($isFirst): ?>
							id="memberLink"
						<?php endif ?>
						href="mailto:<?php echo $item->email ?>"
					>
						<span class="ts--beta">E-Mail:</span>
						<span
							class="member__addr"
							<?php if ($isFirst): ?>
								id="memberMail"
							<?php endif ?>
						>
							<?= $item->email ?>
						</span>
					</a>
					<?php elseif ($isFirst): ?>
					<a
						class="member__mail ts--alpha hide"
						id="memberLink"
						href="#"
					>
						<span class="ts--beta">E-Mail:</span>
						<span
							class="member__addr"
							id="memberMail"
						>#</span>
					</a>
					<?php endif ?>
				</div>
			</article>
			<?php endforeach ?>
		</div>
	</section>
</main>