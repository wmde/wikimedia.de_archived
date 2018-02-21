<?php

use base_core\extensions\cms\Settings;

$this->title('Impressum');
$contact = Settings::read('contact');

?>
<main class="imprint limit--20 center-column cp--h1 cp--t3-5 cp--b2">
	<div class="limit--12 cp--h1 cp--t0-5 cp--b1 sc--white">
		<?= $this->html->link($t('Zur Startseite'), '/', [
			'class' => 'link--green ts--alpha t--strong'
		]) ?>

		<h1 class="tl--beta t--strong cp--t0-5"><?= $t("Impressum und Kontakt") ?></h1>

		<p class="tm--beta">
			<?= $t("
				Dieses Impressum gilt für die Domains wikimedia.de und wikipedia.de.
				Bitte beachten Sie, dass Wikimedia Deutschland nicht der Diensteanbieter
				aller auf dieser Website genannten Wikimedia-Projekte ist.
			") ?>
		</p>

		<section class="cp--t1">
			<h2 class="tm--alpha t--strong"><?= $t("Diensteanbieter") ?></h2>
			<p class="tm--beta">
				<?= $t("Wikimedia Deutschland") ?> – <?= $t("Gesellschaft zur Förderung Freien Wissens e. V.") ?><br>
				Tempelhofer Ufer 23/24<br>
				10963 Berlin<br>
				E-Mail: <a href="mailto:info@wikimedia.de" class="link--black">info@wikimedia.de</a><br>
				<?= $t("Telefon") ?>: +49 (0)30-219 15 826-0<br>
				Fax: +49 (0)30-219 158 26-9<br><br>
				<span class="tm--alpha t--strong"><?= $t("Geschäftsführender Vorstand") ?>:</span> Abraham Taherivand<br>
				<?= $t("
					Eingetragen im Vereinsregister des Amtsgerichts Charlottenburg, VR 23855.
					Inhaltlich Verantwortlicher gemäß § 55 Abs. 2 RStV: Abraham Taherivand
					(Anschrift wie oben).
				") ?>
			</p>
		</section>

		<section class="cp--t1">
			<h2 class="tm--alpha t--strong"><?= $t("Datenschutzerklärung") ?></h2>
			<p class="tm--beta">
				<?= $t("
					Personenbezogene Daten werden auf dieser Webseite nur im technisch
					notwendigen Umfang erhoben. In keinem Fall werden die erhobenen Daten
					verkauft oder aus anderen Gründen an Dritte weitergegeben. Im Folgenden
					erhalten Sie einen Überblick über die von uns im Rahmen dieser Website
					erhobenen Daten.
				") ?>
				<ul>
					<li class="tm--beta">
						<?= $t("
								Log-Files: Bei der Nutzung dieses Angebots werden die von Ihrem
								Browser an den Server übermittelten Daten erfasst und gespeichert.
								Dies umfasst üblicherweise Informationen über den Typ und die
								Version des von Ihnen verwendeten Browsers, das verwendete
								Betriebssystem, die Referrer URL (die Webseite, von der aus Sie zu
								dieser Website gelangt sind), den Hostnamen des zugreifenden
								Rechners (die IP Adresse) sowie die Uhrzeit der Serveranfrage. In
								der Regel lassen sich diese Daten nicht bestimmten Personen – und
								damit auch nicht Ihnen – zuordnen. Weder wird zu diesem Zweck ein
								Abgleich der Daten mit anderen Daten vorgenommen, noch werden sie
								hierfür mit anderen Daten zusammengeführt. Die Daten werden
								regelmäßig nach einer statistischen Auswertung gelöscht.
						") ?>
					</li>
					<li class="tm--beta">
						<?= $t("
							Cookies: Diese Website verwendet an mehreren Stellen Cookies.
							Cookies sind kleine Textdateien, die Ihr Browser speichert und die
							dazu dienen, die Benutzung einer Website einfacher, effektiver und
							sicherer zu machen. Cookies richten auf Ihrem Rechner keinen
							Schaden an, nehmen minimalen Speicherplatz in Anspruch und
							enthalten keine Viren.
						") ?>
					</li>
					<li class="tm--beta">
						<?= $t("
							Google Analytics: Diese Website benutzt Google Analytics, einen
							Webanalysedienst der Google Inc. („Google“). Google Analytics
							verwendet sog. „Cookies“, Textdateien, die auf Ihrem Computer
							gespeichert werden und die eine Analyse der Benutzung der Website
							durch Sie ermöglichen. Die durch das Cookie erzeugten
							Informationen über Ihre Benutzung dieser Website werden in der
							Regel an einen Server von Google in den USA übertragen und dort
							gespeichert. Im Falle der Aktivierung der IP-Anonymisierung auf
							dieser Website, wird Ihre IP-Adresse von Google jedoch innerhalb
							von Mitgliedstaaten der Europäischen Union oder in anderen
							Vertragsstaaten des Abkommens über den Europäischen
							Wirtschaftsraum zuvor gekürzt. Nur in Ausnahmefällen wird die
							volle IP-Adresse an einen Server von Google in den USA
							übertragen und dort gekürzt. Im Auftrag des Betreibers dieser
							Website wird Google diese Informationen benutzen, um Ihre
							Nutzung der Website auszuwerten, um Reports über die
							Websiteaktivitäten zusammenzustellen und um weitere mit der
							Websitenutzung und der Internetnutzung verbundene
							Dienstleistungen gegenüber dem Websitebetreiber zu erbringen. Die
							im Rahmen von Google Analytics von Ihrem Browser übermittelte
							IP-Adresse wird nicht mit anderen Daten von Google
							zusammengeführt. Sie können die Speicherung der Cookies durch
							eine entsprechende Einstellung Ihrer Browser-Software verhindern;
							wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall
							gegebenenfalls nicht sämtliche Funktionen dieser Website
							vollumfänglich werden nutzen können. Sie können darüber hinaus
							die Erfassung der durch das Cookie erzeugten und auf Ihre Nutzung
							der Website bezogenen Daten (inkl. Ihrer IP-Adresse) an Google
							sowie die Verarbeitung dieser Daten durch Google verhindern,
							indem Sie das unter dem folgenden Link
						") ?>
						(<a
							href="<?= $t("http://tools.google.com/dlpage/gaoptout?hl=de") ?>"
							target="new"
							class="link--black"
						><?= $t("http://tools.google.com/dlpage/gaoptout?hl=de") ?></a>)
						<?= $t("
							Google Analytics: Diese Website benutzt Google Analytics, einen
							verfügbare
							Browser-Plugin herunterladen und installieren.
							Sie können die Erfassung durch Google Analytics verhindern, indem
							Sie auf folgenden Link klicken. Es wird ein Opt-Out-Cookie
							gesetzt, das die zukünftige Erfassung Ihrer Daten beim Besuch
							dieser Website verhindert:
						") ?>
						<a
							href=“javascript:gaOptout()“
							class="link--black"
						><?= $t("Google Analytics deaktivieren") ?></a>
						<?= $t("Nähere Informationen zu
							Nutzungsbedingungen und Datenschutz finden Sie unter") ?>
						<a
							href="http://www.google.com/analytics/terms/de.html"
							target="new"
							class="link--black"
						><?= $t("http://www.google.com/analytics/terms/de.html") ?></a> <?= $t("bzw. unter") ?> <a
							href="https://www.google.de/intl/de/policies/"
							target="new"
							class="link--black"
						><?= $t("https://www.google.de/intl/de/policies/") ?></a>.
						<?= $t("
							Wir weisen Sie
							darauf hin, dass auf dieser Website Google Analytics um den Code
							„anonymizeIp“ erweitert wurde, um eine anonymisierte Erfassung
							von IP-Adressen (sog. IP-Masking) zu gewährleisten.
						") ?>
					</li>
					</ul>
			</p>
		</section>

		<section class="cp--t1">
			<h2 class="tm--alpha t--strong"><?= $t("Büro") ?></h2>
			<p class="tm--beta">
				<?= $t("Wikimedia Deutschland") ?><br>
				<?= $t("Gesellschaft zur Förderung Freien Wissens e. V.") ?><br>
				<?= $t("Postfach") ?> 61 03 49<br>
				10925 Berlin<br><br>
				<?= $t("Telefon") ?>: +49 (0)30-219 158 26-0<br>
				Fax: +49 (0)30-219 158 26-9<br>
				E-Mail: <a href="mailto:info@wikimedia.de" class="link--black">info@wikimedia.de</a>
			</p>
		</section>
	</div>
</main>