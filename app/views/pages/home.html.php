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
	<section class="mission sc--white">
		<div class="mission__inner limit--14 cp--v2 center-column">
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
		</div>
	</section>
	<section class="sc--lightblue">
		<div class="limit--20 center-column cp--h1 cp--t1-25">
			<h1 class="t--beta h--alpha">Handlungsfelder</h1>
		</div>
		<div class="fields is-active-support">
			<div class="field-buttons limit--20 center-column cp--0-5">
				<a href="#support" class="field-button field-button--alpha corners corners--green cm--0-5 cp--0-5">
					<div class="field-button__inner tl--gamma t--strong">
						Freiwillige unterstützen, gewinnen und halten
					</div>
				</a>
				<a href="#dev" class="field-button field-button--beta corners corners--green cm--0-5 cp--0-5">
					<div class="field-button__inner tl--gamma t--strong">
						Software entwickeln
					</div>
				</a>
				<a href="#know" class="field-button field-button--gamma corners corners--green cm--0-5 cp--0-5">
					<div class="field-button__inner tl--gamma t--strong">
						Rahmen&shy;be&shy;dingungen für Freies&nbsp;Wissen stärken
					</div>
				</a>
			</div>
			<div class="fields__blurb-wrapper limit--20 center-column cp--b1 cp--h1">
				<div class="fields__blurb limit--5">
					<div class="fields__blurb-top"></div>
					<div class="fields__blurb-lower cp--0-5 tm--beta">
						<article id="support" class="fields__text">
							<!--lorem-->Et velit. Morbi sapien nulla, volutpat a, tristique eu, molestie ac, felis. Suspendisse sit amet tellus non odio porta pellentesque. Nulla.<!--/lorem-->
						</article>
						<article id="dev" class="fields__text hide">
							<!--lorem-->Gravida, risus urna venenatis lectus, ac ultrices quam nulla eu leo. Duis arcu. Class aptent taciti sociosqu ad litora torquent per.<!--/lorem-->
						</article>
						<article id="know" class="fields__text hide">
							<!--lorem-->Etiam vitae quam. Fusce feugiat pede vel quam. In et augue. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus mollis dictum nulla. Integer vitae neque vitae eros fringilla rutrum. Vestibulum in pede adipiscing mi dapibus condimentum. Etiam felis risus, condimentum.<!--/lorem-->
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="cta-bar sc--lightorange">
		<div class="limit--20 center-column cp--v1-25 cta-buttons">
			<a href="#" class="cta-button cp--0-5 cm--1 corners corners--orange">
				<div class="tm--gamma t--caps t--strong">Werde Mitglied bei</div>
				<div class="tm--delta">Wikimedia Deutschland</div>
			</a>
			<a href="#" class="cta-button cp--0-5 cm--1 corners corners--orange">
				<div class="tm--gamma t--caps t--strong">Spende für</div>
				<div class="tm--delta">Freies Wissen</div>
			</a>
		</div>
	</section>

	<section class="news sc--lightgray">
		<div class="news__inner limit--16 center-column cp--h1 cp--t2">
			<h1 class="tl--beta t--strong h--alpha">Aktuelles</h1>
			<article class="news__post cp--b2" id="counterHook">
				<div class="news__box news__box--projects limit--8 cm--l5 cp--v0-5 cp--r0-5 cp--l2-5 sc--white" id="newsBox">
					<h2 class="news__title tm--alpha t--caps t--strong" id="newsTitle">Projekte</h2>
					<div
						class="news__image news__image--active"
						style="background-image: url(<?= $this->assets->url('/app/img/news_test/1.jpg') ?>);"
					></div>
					<h3 class="news__teaser tm--alpha t--strong" id="newsTeaser">
						Ultrices posuere cubilia Curae; Vestibulum hendrerit malesuada odio.
						Fusce ut elit ut augue sollicitudin blandit. Phasellus volutpat lorem.
						Duis non pede.
					</h3>
					<p class="news__text tm--beta cm--b1" id="newsText">
						Eu, dui. Quisque dignissim consequat nisl. Pellentesque porta augue in
						diam. Duis mattis. Aliquam et mi quis turpis pellentesque consequat.
						Suspendisse.
					</p>
					<?= $this->html->link(
						'Zu diesem Projekt',
						'https://de.wikipedia.org/wiki/Pocahontas', [
							'class' => 'news__link link--black ts--alpha t--strong',
							'id' => 'newsLink',
							'target' => 'new'
						]
					) ?>
				</div>
			</article>
			<article class="news__post cp--b2 hide">
				<div class="news__box news__box--wmde limit--8 cm--l5 cp--v0-5 cp--r0-5 cp--l2-5 sc--white">
					<h2 class="news__title tm--alpha t--caps t--strong">Wikimedia</h2>
					<div
						class="news__image"
						style="background-image: url(<?= $this->assets->url('/app/img/news_test/2.jpg') ?>);"
					></div>
					<h3 class="news__teaser tm--alpha t--strong">
						Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
						In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
						Nullam dictum felis eu pede mollis pretium. Integer tincidunt.
					</h3>
					<p class="news__text tm--beta cm--b1">
						Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
						Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
						Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
						Phasellus viverra nulla ut metus varius laoreet.
					</p>
					<?= $this->html->link(
						'Zu diesem Projekt',
						'https://en.wikipedia.org/wiki/The_Ant_and_the_Grasshopper', [
							'class' => 'news__link link--black ts--alpha t--strong',
							'target' => 'new'
						]
					) ?>
				</div>
			</article>
			<article class="news__post cp--b2 hide">
				<div class="news__box news__box--members limit--8 cm--l5 cp--v0-5 cp--r0-5 cp--l2-5 sc--white">
					<h2 class="news__title tm--alpha t--caps t--strong">Mitglieder</h2>
					<div
						class="news__image"
						style="background-image: url(<?= $this->assets->url('/app/img/news_test/3.jpg') ?>);"
					></div>
					<h3 class="news__teaser tm--alpha t--strong">
						Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.
						Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
					</h3>
					<p class="news__text tm--beta cm--b1">
						Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper
						libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,
						blandit vel, luctus pulvinar, hendrerit id, lorem.
					</p>
					<?= $this->html->link(
						'Zu diesem Projekt',
						'https://de.wikipedia.org/wiki/Mitglied', [
							'class' => 'news__link link--black ts--alpha t--strong',
							'target' => 'new'
						]
					) ?>
				</div>
			</article>
			<article class="news__post cp--b2 hide">
				<div class="news__box news__box--init limit--8 cm--l5 cp--v0-5 cp--r0-5 cp--l2-5 sc--white">
					<h2 class="news__title tm--alpha t--caps t--strong">Initiative</h2>
					<div
						class="news__image"
						style="background-image: url(<?= $this->assets->url('/app/img/news_test/4.jpg') ?>);"
					></div>
					<h3 class="news__teaser tm--alpha t--strong">
						Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien
						ut libero venenatis faucibus. Nullam quis ante.
					</h3>
					<p class="news__text tm--beta cm--b1">
						Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed
						fringilla mauris sit amet nibh. Donec sodales sagittis magna.
					</p>
					<?= $this->html->link(
						'Zu diesem Projekt',
						'https://de.wikipedia.org/wiki/Eigeninitiative', [
							'class' => 'news__link link--black ts--alpha t--strong',
							'target' => 'new'
						]
					) ?>
				</div>
			</article>
			<article class="news__post cp--b2 hide">
				<div class="news__box news__box--wmde limit--8 cm--l5 cp--v0-5 cp--r0-5 cp--l2-5 sc--white">
					<h2 class="news__title tm--alpha t--caps t--strong">Wikimedia</h2>
					<div
						class="news__image"
						style="background-image: url(<?= $this->assets->url('/app/img/news_test/5.jpg') ?>);"
					></div>
					<h3 class="news__teaser tm--alpha t--strong">
						Donec mollis hendrerit risus. Phasellus nec sem in justo
						pellentesque facilisis. Etiam imperdiet imperdiet orci.
					</h3>
					<p class="news__text tm--beta cm--b1">
						Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam
						nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat,
						pede. Sed lectus.
					</p>
					<?= $this->html->link(
						'Zu diesem Projekt',
						'https://de.wikipedia.org/wiki/Johann_Bessler', [
							'class' => 'news__link link--black ts--alpha t--strong',
							'target' => 'new'
						]
					) ?>
				</div>
			</article>
		</div>
	</section>

	<section class="team sc--white">
		<div class="team__inner limit--14 cp--t1-25 center-column">
			<h1 class="tl--beta t--strong h--alpha">Unser Präsidium</h1>
			<article class="member cp--b4" id="teamStage">
				<h2 class="member__name hide" id="memberName">Tim Moritz Hector</h2>
				<div
					class="member__image limit--5"
					id="memberImg"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/1.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong" id="memberRole">Vorsitzender</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text" id="memberText">Lorem ipsum dolor sit amet,
						consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
						Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
						mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec
						pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" id="memberLink" href="mailto:tim.moritz.hector@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr" id="memberMail">tim.moritz.hector@wikimedia.de</span>
					</a>
				</div>
			</article>
			<article class="member cp--b4">
				<h2 class="member__name">Sabria David</h2>
				<div
					class="member__image limit--5"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/2.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong">Stellvertretende Vorsitzende</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text">Ich forsche und berate zu den Auswirkungen und
						Potentialen des digitalen Wandels. Wikipedia fasziniert mich vor allem als
						offenes System und diskursives Werk, als Modell einer Schriftkultur der Zukunft.
						Ich bin Mitgründerin des Slow Media Instituts und Mitautorin vom Slow Media
						Manifest und der Declaration of Liquid Culture.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" href="mailto:sabria.david@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr">sabria.david@wikimedia.de</span>
					</a>
				</div>
			</article>
			<article class="member cp--b4">
				<h2 class="member__name">Kurt Jansson</h2>
				<div
					class="member__image limit--5"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/3.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong">Stellvertretender Vorsitzender</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text">Nulla consequat massa quis enim. In enim justo,
						rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
						mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
						Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat
						vitae, eleifend ac, enim.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" href="mailto:kurt.jansson@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr">kurt.jansson@wikimedia.de</span>
					</a>
				</div>
			</article>
			<article class="member cp--b4">
				<h2 class="member__name">Sebastian Moleski</h2>
				<div
					class="member__image limit--5"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/4.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong">Schatzmeister</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text">Aliquam lorem ante, dapibus in, viverra quis,
						feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque
						rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper
						ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
						condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed
						ipsum.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" href="mailto:sebastian.moleski@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr">sebastian.moleski@wikimedia.de</span>
					</a>
				</div>
			</article>
			<article class="member cp--b4">
				<h2 class="member__name">Harald Krichel</h2>
				<div
					class="member__image limit--5"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/5.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong">Beisitzer</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text">Nam quam nunc, blandit vel, luctus pulvinar,
						hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae
						sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
						eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec
						sodales sagittis magna.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" href="mailto:harald.krichel@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr">harald.krichel@wikimedia.de</span>
					</a>
				</div>
			</article>
			<article class="member cp--b4">
				<h2 class="member__name">Lukas Mezger</h2>
				<div
					class="member__image limit--5"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/6.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong">Beisitzer</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text">Sed consequat, leo eget bibendum sodales,
						augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate
						eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy
						id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit
						fringilla.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" href="mailto:lukas.mezger@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr">lukas.mezger@wikimedia.de</span>
					</a>
				</div>
			</article>
			<article class="member cp--b4">
				<h2 class="member__name">Johanna Niesyto</h2>
				<div
					class="member__image limit--5"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/7.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong">Beisitzerin</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text">Vestibulum ante ipsum primis in faucibus orci
						luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer
						lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet
						nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu,
						accumsan a, consectetuer eget, posuere ut, mauris.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" href="mailto:johanna.niesyto@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr">johanna.niesyto@wikimedia.de</span>
					</a>
				</div>
			</article>
			<article class="member cp--b4">
				<h2 class="member__name">Peter Dewald</h2>
				<div
					class="member__image limit--5"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/8.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong">Beisitzer</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text">Praesent adipiscing. Phasellus ullamcorper ipsum
						rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id
						dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies
						sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit
						risus.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" href="mailto:peter.dewald@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr">peter.dewald@wikimedia.de</span>
					</a>
				</div>
			</article>
			<article class="member cp--b4">
				<h2 class="member__name">Gabriele Theren</h2>
				<div
					class="member__image limit--5"
					style="background-image: url(<?= $this->assets->url('/app/img/team_test/9.jpg') ?>);"
				>
				</div>
				<div class="member__info limit--5">
					<h3 class="member__role tm--alpha t--strong">Beisitzerin</h3>
					<p class="tm--beta">
						&raquo;<span class="member__text">Phasellus nec sem in justo pellentesque facilisis.
						Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non,
						auctor et, hendrerit quis, nisi. Curabitur ligula sapien, tincidunt non, euismod
						vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa.
						Sed cursus turpis vitae tortor.</span>&laquo;
					</p>
					<a class="member__mail ts--alpha" href="mailto:gabriele.theren@wikimedia.de">
						<span class="ts--beta">E-Mail:&nbsp;</span><span class="member__addr">gabriele.theren@wikimedia.de</span>
					</a>
				</div>
			</article>
		</div>
	</section>
</main>