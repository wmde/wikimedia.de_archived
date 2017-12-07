<?php

use base_core\extensions\cms\Settings;

$this->title('Impressum');
$contact = Settings::read('contact');

?>
<main class="imprint limit--20 center-column cp--h1 cp--t3-5 cp--b2">
	<div class="limit--12 cp--h1 cp--t0-5 cp--b1 sc--white">
		<?= $this->html->link('Zur Startseite', '/', [
			'class' => 'link--green ts--alpha t--strong'
		]) ?>

		<h1 class="tl--beta t--strong cp--t0-5">Impressum und Kontakt</h1>

		<p class="tm--beta">
			Dieses Impressum gilt für die Domains wikimedia.de und wikipedia.de.
			Bitte beachten Sie, dass Wikimedia Deutschland nicht der Diensteanbieter
			aller auf dieser Website genannten Wikimedia-Projekte ist.
		</p>

		<section class="cp--t1">
			<h2 class="tm--alpha t--strong">Diensteanbieter</h2>
			<p class="tm--beta">
				Wikimedia Deutschland – Gesellschaft zur Förderung Freien Wissens e. V.<br>
				Tempelhofer Ufer 23/24<br>
				10963 Berlin<br>
				E-Mail: <a href="mailto:info@wikimedia.de" class="link--black">info@wikimedia.de</a><br>
				Telefon: +49 (0)30-219 15 826-0<br>
				Fax: +49 (0)30-219 158 26-9<br><br>
				<span class="tm--alpha t--strong">Geschäftsführender Vorstand:</span> Abraham Taherivand<br>
				Eingetragen im Vereinsregister des Amtsgerichts Charlottenburg, VR 23855.
				Inhaltlich Verantwortlicher gemäß § 55 Abs. 2 RStV: Abraham Taherivand
				(Anschrift wie oben).
			</p>
		</section>

		<section class="cp--t1">
			<h2 class="tm--alpha t--strong">Datenschutzerklärung</h2>
			<p class="tm--beta">
				Personenbezogene Daten werden auf dieser Webseite nur im technisch
				notwendigen Umfang erhoben. In keinem Fall werden die erhobenen Daten
				verkauft oder aus anderen Gründen an Dritte weitergegeben. Im Folgenden
				erhalten Sie einen Überblick über die von uns im Rahmen dieser Website
				erhobenen Daten.
				<ul>
					<li class="tm--beta">
						Log-Files: Bei der Nutzung dieses Angebots werden die von Ihrem
						Browser an den Server übermittelten Daten erfasst und gespeichert.
						Dies umfasst üblichweise Informationen über den Typ und die
						Version des von Ihnen verwendeten Browsers, das verwendete
						Betriebssystem, die Referrer URL (die Webseite, von der aus Sie zu
						dieser Website gelangt sind), den Hostnamen des zugreifenden
						Rechners (die IP Adresse) sowie die Uhrzeit der Serveranfrage. In
						der Regel lassen sich diese Daten nicht bestimmten Personen – und
						damit auch nicht Ihnen – zuordnen. Weder wird zu diesem Zweck ein
						Abgleich der Daten mit anderen Daten vorgenommen, noch werden sie
						hierfür mit anderen Daten zusammengeführt. Die Daten werden
						regelmäßig nach einer statistischen Auswertung gelöscht.
					</li>
					<li class="tm--beta">
						Cookies: Diese Website verwendet an mehreren Stellen Cookies.
						Cookies sind kleine Textdateien, die Ihr Browser speichert und die
						dazu dienen, die Benutzung einer Website einfacher, effektiver und
						sicherer zu machen. Cookies richten auf Ihrem Rechner keinen
						Schaden an, nehmen minimalen Speicherplatz in Anspruch und
						enthalten keine Viren.
					</li>
				</ul>
			</p>
		</section>

		<section class="cp--t1">
			<h2 class="tm--alpha t--strong">Büro</h2>
			<p class="tm--beta">
				Wikimedia Deutschland<br>
				Gesellschaft zur Förderung Freien Wissens e. V.<br>
				Postfach 61 03 49<br>
				10925 Berlin<br><br>
				Telefon: +49 (0)30-219 158 26-0<br>
				Fax: +49 (0)30-219 158 26-9<br>
				E-Mail: <a href="mailto:info@wikimedia.de" class="link--black">info@wikimedia.de</a>
			</p>
		</section>
	</div>
</main>