function tabslide(Tab,Chapitre) {
	this.tab = Tab;
	this.chapitre = Chapitre;
	$('.s' + tab + '-chap1').css('display','none');
	$('.s' + tab + '-chap2').css('display','none');
	$('.s' + tab + '-chap3').css('display','none');
	$('.s' + tab + '-chap' + chapitre).css('display','inline');
}

/*
this.slide = 1;
this.chap = 1;
this.tuile = 0;

function rfaContent(slide,chap,tuile) {
	/* On efface le contenu Tabs en cours
	$('.tabs' + slide).css('display','none');

	/* On affiche le rfa-content demandé
	this.slide = Slide; this.chap = Chap; this.tuile = Tuile;
	$('.rfa-content' + slide + '-' + chap + '-' + tuile).css('display','table');
}
*/

function rfaContent(Tab) {
	this.tab = Tab;

	/* On affiche les 4 Tabs */
	$('.tabs1').css('display','table');
	$('.tabs2').css('display','table');
	$('.tabs3').css('display','table');
	$('.tabs4').css('display','table');
	/* On efface le Tabs demandé */
	$('.tabs' + tab).css('display','none');

	/* On efface les 4 rfa-content */
	$('.rfa-content1').css('display','none');
	$('.rfa-content2').css('display','none');
	$('.rfa-content3').css('display','none');
	$('.rfa-content4').css('display','none');
	/* On affiche le rfa-content demandé */
	$('.rfa-content' + tab).css('display','table');
}

function rfaContentreturn(Tab,Chapitre) {
	this.tab = Tab;
	this.chap = Chapitre;

	/* On efface le rfa-content en cours */
	$('.rfa-content' + tab).css('display','none');
	/* On affiche le Tabs en cours */
	$('.tabs' + tab).css('display','table');

	/* On efface les 3 chap du tabs concerné */
	$('.s' + tab + '-chap1').css('display','none');
	$('.s' + tab + '-chap2').css('display','none');
	$('.s' + tab + '-chap3').css('display','none');
	/* On affiche le chap demandé */
	$('.s' + tab + '-chap' + chap).css('display','inline');
}