function clearlist(hidden) {
	//value of hidden should be a 1 or 0.  A 1 == hidden, 0 == unhidden
	/*document.mainform.subsubcat.options.length = 0;
	
	if (hidden == 0) {
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
	}
	else if (hidden == 1) {
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
	}
	else {
		alert("An error has occurred with the processing of the form. \n\nPlease refresh the page");
	}*/
	alert("This function is depreciated.  Please use the new functions");
}

function hideSubCat() {
	subcat1.className = 'hidden';
	subcat1.className = 'hidden';
}

function showSubCat() {
	subcat1.className = 'unhidden';
	subcat2.className = 'unhidden';
}

function hideSubSubCat() {
	subsubcat1.className = 'hidden';
	subsubcat2.className = 'hidden';
}

function showSubSubCat() {
	subsubcat1.className = 'unhidden';
	subsubcat2.className = 'unhidden';
}

function parseform() {
var cat = document.mainform.category.selectedIndex;
var scat = document.mainform.subcat.selectedIndex;
var sscat = document.mainform.subsubcat.selectedIndex;

if (cat == '1') {
	if (scat == '1') { // Agriculture
		hideSubSubCat();
		document.mainform.subsubcat.options[0] = new Option("All",'all', false, false);
		}
	else if (scat == '2') { // Architecture
		showSubSubCat();
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Architects, firms, organisations","firms", false, false);
		document.mainform.subsubcat.options[2] = new Option("Buildings","buildings", false, false);
		document.mainform.subsubcat.options[3] = new Option("General concepts, styles","general", false, false);
		document.mainform.subsubcat.options[4] = new Option("Urban studies and planning","urban", false, false);
		}
	else if (scat == '3') { // Communications
		hideSubSubCat();
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("byname",'byname', false, false);
		}
	else if (scat == '4') { // Computer sicence, computing, and Internet
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Algorithms","algorithms", false, false);
		document.mainform.subsubcat.options[2] = new Option("Computer books","computerbooks", false, false);
		document.mainform.subsubcat.options[3] = new Option("Widget Toolkits","", false, false); //Ordering?
		document.mainform.subsubcat.options[4] = new Option("Computer management","management", false, false);
		document.mainform.subsubcat.options[5] = new Option("Computer architecture","architecture", false, false);
		document.mainform.subsubcat.options[6] = new Option("Computer languages","", false, false);
		document.mainform.subsubcat.options[7] = new Option("Early computer models/processors","earlycomputers", false, false);
		document.mainform.subsubcat.options[8] = new Option("Hardware (Human Input Devices)","hardware-hid", false, false);
		document.mainform.subsubcat.options[9] = new Option("Hardware (Displays and Screens)","hardware-ds", false, false);
		document.mainform.subsubcat.options[10] = new Option("Hardware (Audio Sub-systems)","hardware-audio", false, false);
		document.mainform.subsubcat.options[11] = new Option("Hardware (Memory Devices)","hardware-md", false, false);
		document.mainform.subsubcat.options[12] = new Option("Hardware (Microprocessors)","hardware-micro", false, false);
		document.mainform.subsubcat.options[13] = new Option("The Internet","internet", false, false);
		document.mainform.subsubcat.options[14] = new Option("People","people", false, false);
		document.mainform.subsubcat.options[15] = new Option("Organizations","organizations", false, false);
		document.mainform.subsubcat.options[16] = new Option("Operating systems","os", false, false);
		document.mainform.subsubcat.options[17] = new Option("Programming","programming", false, false);
		document.mainform.subsubcat.options[18] = new Option("Protocols","protocols", false, false);
		document.mainform.subsubcat.options[19] = new Option("Real-Time computing","realtime", false, false);
		document.mainform.subsubcat.options[20] = new Option("Searching/search engines","search", false, false);
		document.mainform.subsubcat.options[21] = new Option("Security","security", false, false);
		document.mainform.subsubcat.options[22] = new Option("Software","software-byname", false, false);
		document.mainform.subsubcat.options[23] = new Option("Software engineering","softwareengineering", false, false);
		document.mainform.subsubcat.options[24] = new Option("Storage (File formats)","storage-ff", false, false);
		document.mainform.subsubcat.options[25] = new Option("Storage (Databases)","storage-db", false, false);
		document.mainform.subsubcat.options[26] = new Option("Theory and theorem","theory", false, false);
		}
	else if (scat == '5') { // Design
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("All","all", false, false);
		}
	else if (scat == '6') { //Electronics
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Components","componenets", false, false);
		document.mainform.subsubcat.options[2] = new Option("Concepts","concepts", false, false);
		document.mainform.subsubcat.options[3] = new Option("People","people", false, false); //Should I include this?
		document.mainform.subsubcat.options[4] = new Option("Semiconductor","semiconductor", false, false);
		document.mainform.subsubcat.options[5] = new Option("Signal Processing","signal", false, false);
		document.mainform.subsubcat.options[6] = new Option("Systems","systems", false, false);
		document.mainform.subsubcat.options[7] = new Option("Other","other", false, false);
		}
	else if (scat == '7') { //Engineering
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Aeronautical/Aerospace","aerospace", false, false);
		document.mainform.subsubcat.options[2] = new Option("Agricultural/Biological","agricultural", false, false);
		document.mainform.subsubcat.options[3] = new Option("Chemical/Process","chemical", false, false);
		document.mainform.subsubcat.options[4] = new Option("Civil/Structural","civil", false, false);
		document.mainform.subsubcat.options[5] = new Option("Design/Drafting","design", false, false);
		document.mainform.subsubcat.options[6] = new Option("Electrical","electrical", false, false);
		document.mainform.subsubcat.options[7] = new Option("Fluid mechanics","fluid", false, false);
		document.mainform.subsubcat.options[8] = new Option("Instrumentation and controls","controls", false, false);
		document.mainform.subsubcat.options[9] = new Option("Materials","materials", false, false);
		document.mainform.subsubcat.options[10] = new Option("Mechanical","mechanical", false, false);
		document.mainform.subsubcat.options[11] = new Option("Non-mechanical","nonmechanical", false, false);
		document.mainform.subsubcat.options[12] = new Option("Energy and power","energy", false, false);
		document.mainform.subsubcat.options[13] = new Option("Textiles","textiles", false, false);
		document.mainform.subsubcat.options[14] = new Option("Other","unsorted", false, false);
		}
	else if (scat == '8') { // Fishing, fisheries, and aquaculture
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("All",'all', false, false);
		}
	else if (scat == '9') { // Industry
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("All",'all', false, false);
		}
	else if (scat == '10') { // Law
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Concepts","concepts", false, false);
		document.mainform.subsubcat.options[2] = new Option("Crimes","crimes", false, false);
		document.mainform.subsubcat.options[3] = new Option("Jurists, judges, attorneys, legal organizations, and legal workers","people", false, false);
		document.mainform.subsubcat.options[4] = new Option("Notable court cases and litigants","cases", false, false);
		document.mainform.subsubcat.options[5] = new Option("Intellectual property (Copyright)","intprop-copyright", false, false);
		document.mainform.subsubcat.options[6] = new Option("Intellectual property (Patent)","intprop-patent", false, false);
		document.mainform.subsubcat.options[7] = new Option("Intellectual property (Trademark)","intprop-tm", false, false);
		document.mainform.subsubcat.options[8] = new Option("Intellectual property (English language journals)","intprop-en-journals", false, false);
		document.mainform.subsubcat.options[9] = new Option("Intellectual property (French language journals)","intprop-fr-journals", false, false);
		document.mainform.subsubcat.options[10] = new Option("Intellectual property (German language journals)","intprop-ge-journals", false, false);
		document.mainform.subsubcat.options[11] = new Option("Intellectual property (Italian language journals)","intprop-it-journals", false, false);
		document.mainform.subsubcat.options[12] = new Option("Intellectual property (Other)","intprop-other", false, false);
		document.mainform.subsubcat.options[13] = new Option("Statutes","statutes", false, false);
		document.mainform.subsubcat.options[14] = new Option("Legal terms","terms-byname", false, false);
		document.mainform.subsubcat.options[15] = new Option("Treaties","treaties", false, false);
		document.mainform.subsubcat.options[16] = new Option("Other","other", false, false);
		}
	else if (scat == '11') { // Crime
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("byname",'byname', false, false);
		}
	else if (scat == '12') { // Library Sciences
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("All",'all', false, false);
		}
	else if (scat == '13') { // Medicine
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("AIDS terminology","aids", false, false);
		document.mainform.subsubcat.options[2] = new Option("Alternative medicine","alternative", false, false);
		document.mainform.subsubcat.options[3] = new Option("Anatomy and physiology","anatomy", false, false);
		document.mainform.subsubcat.options[4] = new Option("Associations","associations", false, false);
		document.mainform.subsubcat.options[5] = new Option("Careers","careers", false, false);
		document.mainform.subsubcat.options[6] = new Option("Dentistry","dentistry", false, false);
		document.mainform.subsubcat.options[7] = new Option("Diseases / conditions / signs / symptoms","diseases", false, false);
		document.mainform.subsubcat.options[8] = new Option("History","history", false, false);
		document.mainform.subsubcat.options[9] = new Option("Hospitals and medical centers","hospitals", false, false);
		document.mainform.subsubcat.options[10] = new Option("Journals / websites","journals", false, false);
		document.mainform.subsubcat.options[11] = new Option("Medical devices / tests","tests", false, false);
		document.mainform.subsubcat.options[12] = new Option("Medical administration","admin", false, false);
		document.mainform.subsubcat.options[13] = new Option("Microbiology and Cell Biology","biology", false, false);
		document.mainform.subsubcat.options[14] = new Option("Oncology","oncology", false, false);
		document.mainform.subsubcat.options[15] = new Option("Ophthalmology","ophthalmology", false, false);
		document.mainform.subsubcat.options[16] = new Option("Pathology","pathology", false, false);
		document.mainform.subsubcat.options[17] = new Option("People","people", false, false);
		document.mainform.subsubcat.options[18] = new Option("Pharmacology","pharmacology", false, false);
		document.mainform.subsubcat.options[19] = new Option("Positions","positions", false, false);
		document.mainform.subsubcat.options[20] = new Option("Radiology","radiology", false, false);
		document.mainform.subsubcat.options[21] = new Option("Research terms","research", false, false);
		document.mainform.subsubcat.options[22] = new Option("Sex and OBGYN","sex", false, false);
		document.mainform.subsubcat.options[23] = new Option("Treatments / procedures","treatments", false, false);
		document.mainform.subsubcat.options[24] = new Option("Vaccinations","vaccinations", false, false);
		document.mainform.subsubcat.options[25] = new Option("Veterinary medicine","vetmed", false, false);
		document.mainform.subsubcat.options[26] = new Option("Other","other", false, false);
		}
	else if (scat == '14') { // Pharmacology
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("byname",'byname-split', false, false);
		}
	else if (scat == '15') { // Schools
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("All",'all', false, false);
		}
	else if (scat == '16') { // Technology and tools
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Vehicle/automotive technology","automotive", false, false);
		document.mainform.subsubcat.options[2] = new Option("Military technology","military", false, false);
		document.mainform.subsubcat.options[3] = new Option("Weapons","weapons", false, false);
		document.mainform.subsubcat.options[4] = new Option("Other","byname", false, false);
		}
	else if (scat == '17') { // Transportation
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("General","general", false, false);
		document.mainform.subsubcat.options[2] = new Option("Aviation (aircraft)","av-aircraft", false, false);
		document.mainform.subsubcat.options[3] = new Option("Aviation (other)","av-other", false, false);
		document.mainform.subsubcat.options[4] = new Option("Rail (Locomotives)","rail-locomotives", false, false);
		document.mainform.subsubcat.options[5] = new Option("Rail (Diesel multiple units)","rail-dmu", false, false);
		document.mainform.subsubcat.options[6] = new Option("Rail (Electric multiple units)","rail-emu", false, false);
		document.mainform.subsubcat.options[7] = new Option("Rail (Coaches)","rail-coaches", false, false);
		document.mainform.subsubcat.options[8] = new Option("Rail (Stations)","rail-stations", false, false);
		document.mainform.subsubcat.options[9] = new Option("Rail (Works and Depots)","rail-wad", false, false);
		document.mainform.subsubcat.options[10] = new Option("Rail(Airport People Movers)","rail-apm", false, false);
		document.mainform.subsubcat.options[11] = new Option("Road (Automobiles)","road-auto", false, false);
		document.mainform.subsubcat.options[12] = new Option("Road (Busses)","road-busses", false, false);
		document.mainform.subsubcat.options[13] = new Option("Road (Motorcycles)","road-motorcycles", false, false);
		document.mainform.subsubcat.options[14] = new Option("Road (Trucks)","road-trucks", false, false);
		document.mainform.subsubcat.options[15] = new Option("Road (Roads and Highways)","road-highways", false, false);
		document.mainform.subsubcat.options[16] = new Option("Road (Other)","road-other", false, false);
		document.mainform.subsubcat.options[17] = new Option("Rockets and Spacecraft (Fuels)","ras-fuels", false, false);
		document.mainform.subsubcat.options[18] = new Option("Rockets and Spacecraft (Spacecraft)","ras-craft", false, false);
		document.mainform.subsubcat.options[19] = new Option("Rockets and Spacecraft (Launch pads)","ras-pads", false, false);
		document.mainform.subsubcat.options[20] = new Option("Rockets and Spacecraft (Scientific research on the ISS)","ras-iss", false, false);
		document.mainform.subsubcat.options[21] = new Option("Water (Ships and boats)","water-ships", false, false);
		document.mainform.subsubcat.options[22] = new Option("Water (Ports)","water-ports", false, false);
		document.mainform.subsubcat.options[23] = new Option("Water (Speed Records)","water-records", false, false);
		document.mainform.subsubcat.options[24] = new Option("Water (Other)","water-other", false, false);
		}
	else {
		document.mainform.subcat.options.length=0;
		subcat1.className='unhidden';
		subcat2.className='unhidden';
		subsubcat1.className='hidden';
		subsubcat2.className='hidden';
		document.mainform.subcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subcat.options[1] = new Option("Agriculture","agriculture", false, false);
		document.mainform.subcat.options[2] = new Option("Architecture","architecture", false, false);
		document.mainform.subcat.options[3] = new Option("Communications","communications", false, false);
		document.mainform.subcat.options[4] = new Option("Computer science, computing, and Internet","computerscience", false, false);
		document.mainform.subcat.options[5] = new Option("Design","design", false, false);
		document.mainform.subcat.options[6] = new Option("Electronics","electronics", false, false);
		document.mainform.subcat.options[7] = new Option("Engineering","engineering", false, false);
		document.mainform.subcat.options[8] = new Option("Fishing, fisheries, and aquaculture","fishing", false, false);
		document.mainform.subcat.options[9] = new Option("Industry","industry", false, false);
		document.mainform.subcat.options[10] = new Option("Law","law", false, false);
		document.mainform.subcat.options[11] = new Option("Law enforcement and crime","lawenforcement", false, false);
		document.mainform.subcat.options[12] = new Option("Library sciences","libsci", false, false);
		document.mainform.subcat.options[13] = new Option("Medicine","medicine", false, false);
		document.mainform.subcat.options[14] = new Option("Pharmacology","pharmacology", false, false);
		document.mainform.subcat.options[15] = new Option("Schools","schools", false, false);
		document.mainform.subcat.options[16] = new Option("Technology and tools","technology", false, false);
		document.mainform.subcat.options[17] = new Option("Transportation","transportation", false, false);
		}
	}
else if (cat == '2') {
	if (scat=='1') { //Fashion
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Byname","byname-ind", true, false);
	}
	else if (scat=='2') { //Film, radio, and television
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subsubcat.options[1] = new Option("Anime and Manga","anime-byname-ind", false, false);
		document.mainform.subsubcat.options[2] = new Option("People","people-byname-ind", false, false);
		document.mainform.subsubcat.options[3] = new Option("Directors","directors-byname-ind", false, false);
		document.mainform.subsubcat.options[4] = new Option("Fictional Characters","ficchars-byname-ind", false, false);
		document.mainform.subsubcat.options[5] = new Option("Radio","radio-byindname", false, false);
		document.mainform.subsubcat.options[6] = new Option("Film and Television","film-byname", false, false);
		document.mainform.subsubcat.options[7] = new Option("Networks and Orginizations","networks", false, false);
		document.mainform.subsubcat.options[8] = new Option("Theorists","theorists", false, false);
		document.mainform.subsubcat.options[9] = new Option("Film People","film-people", false, false);
		document.mainform.subsubcat.options[10] = new Option("Film Companies","film-companies", false, false);
		document.mainform.subsubcat.options[11] = new Option("Film technology and equipment","film-tech", false, false);
		document.mainform.subsubcat.options[12] = new Option("Film festivals","film-festivals", false, false);
		document.mainform.subsubcat.options[13] = new Option("Film genres","film-genres", false, false);
		document.mainform.subsubcat.options[14] = new Option("Film making terms","film-makingterms", false, false);
		document.mainform.subsubcat.options[15] = new Option("Film societies and advocacy groups","film-societies", false, false);
		document.mainform.subsubcat.options[16] = new Option("Film fandom","film-fandom", false, false);
		document.mainform.subsubcat.options[17] = new Option("Film stocks","film-stocks", false, false);
		document.mainform.subsubcat.options[18] = new Option("Lists of films","film-list", false, false);
		document.mainform.subsubcat.options[19] = new Option("Movie Theatres","film-theatres", false, false);
		document.mainform.subsubcat.options[20] = new Option("Film Commissions","film-comissions", false, false);
		document.mainform.subsubcat.options[21] = new Option("Media Conglomerates","conglomerates", false, false);
		document.mainform.subsubcat.options[22] = new Option("Media Directories","directories", false, false);
		document.mainform.subsubcat.options[23] = new Option("Other","other", false, false);
	}
	else if (scat=='3') { //Food, drink, and nutrition
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Byname","byname", true, false);
	}
	else if (scat=='4') { //Internet and tech culture
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subsubcat.options[1] = new Option("Podcasts","podcasts-byname-ind", false, false);
		document.mainform.subsubcat.options[2] = new Option("Terminology","terminology-byname-ind", false, false);
		document.mainform.subsubcat.options[3] = new Option("Webcompics","webcomics", false, false);
		document.mainform.subsubcat.options[4] = new Option("Webshows","webshows-byname-ind", false, false);
		document.mainform.subsubcat.options[5] = new Option("Websites","websites-byname-ind", false, false);
		document.mainform.subsubcat.options[6] = new Option("Other","other", false, false);
	}
	else if (scat=='5') { //Literature
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subsubcat.options[1] = new Option("Authors (poets, dramatists, and fiction writers)","authors-pdfw", false, false);
		document.mainform.subsubcat.options[2] = new Option("Authors (other than poets, dramatists, and fiction writers)","authors-other", false, false);
		document.mainform.subsubcat.options[3] = new Option("Books","books-byindname", false, false);
		document.mainform.subsubcat.options[4] = new Option("Literacy movements and styles","litmovements", false, false);
		document.mainform.subsubcat.options[5] = new Option("Literacy terms","litterms", false, false);
		document.mainform.subsubcat.options[6] = new Option("Theatre and stage","theatre", false, false);
		document.mainform.subsubcat.options[7] = new Option("Translators","translators", false, false);
		document.mainform.subsubcat.options[8] = new Option("Works and publications","workspubs-byname", false, false);
	}
	else if (scat=='6') { //Performing Arts
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subsubcat.options[1] = new Option("Circus","circus", false, false);
		document.mainform.subsubcat.options[2] = new Option("Comedy","comedy", false, false);
		document.mainform.subsubcat.options[3] = new Option("Ballet","dance-ballet", false, false);
		document.mainform.subsubcat.options[4] = new Option("Dance Coreographers and professional dancers","dance-coregoraphers-byn ame", false, false);
		document.mainform.subsubcat.options[5] = new Option("Dance companies","dance-companies", false, false);
		document.mainform.subsubcat.options[6] = new Option("Dances","dance-dances", false, false);
		document.mainform.subsubcat.options[7] = new Option("Other dance-related topic","dance-other", false, false);
		document.mainform.subsubcat.options[8] = new Option("Operas","opera-operas", false, false);
		document.mainform.subsubcat.options[9] = new Option("Opera composers and librettists","opera-cal", false, false);
		document.mainform.subsubcat.options[10] = new Option("Opera Conductors","opera-conductors", false, false);
		document.mainform.subsubcat.options[11] = new Option("Opera genres","opera-genres", false, false);
		document.mainform.subsubcat.options[12] = new Option("Opera houses and companies","opera-hac", false, false);
		document.mainform.subsubcat.options[13] = new Option("Theatre","theatre-byname", false, false);
		document.mainform.subsubcat.options[14] = new Option("Other","other", false, false);
	}
	else if (scat=='7') { //Print Media
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Fandom","fandom", false, false);
		document.mainform.subsubcat.options[2] = new Option("Journalists and Journalism","journalism-byname", false, false);
		document.mainform.subsubcat.options[3] = new Option("Journalism Concepts","journalismconcepts", false, false);
		document.mainform.subsubcat.options[4] = new Option("Magizines","magizines-byname", false, false);
		document.mainform.subsubcat.options[5] = new Option("Newspapers","newspapers", false, false);
		document.mainform.subsubcat.options[6] = new Option("Newspapers (USA street papers)","newspapers-usastreet", false, false);
		document.mainform.subsubcat.options[7] = new Option("Newspapers (Canadian street papers)","newspapers-canadastreet", false, false);
		document.mainform.subsubcat.options[8] = new Option("Newspapers (Europe street papers)","newspapers-europestreet", false, false);
		document.mainform.subsubcat.options[9] = new Option("Newspapers (Other street papers)","newspapers-otherstreet", false, false);
		document.mainform.subsubcat.options[10] = new Option("Newspaper comic strips","comicstrips", false, false);
		document.mainform.subsubcat.options[11] = new Option("Publishers","publishers", false, false);
	}
	else if (scat=='8') { //Museums
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("All","all", false, false);
	}
	else if (scat=='9') { //Music
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Bands, performers, and songwriters","bands", false, false);
		document.mainform.subsubcat.options[2] = new Option("Classical Composers","classicalcomposers-byname-ind", false, false);
		document.mainform.subsubcat.options[3] = new Option("Classical Compositions","classicalcompositions-byname", false, false);
		document.mainform.subsubcat.options[4] = new Option("Conductors","conductors", false, false);
		document.mainform.subsubcat.options[5] = new Option("Critics, historians, journalists, and publishers - people","critics-people", false, false);
		document.mainform.subsubcat.options[6] = new Option("Critics, historians, journalists, and publishers - other","critics-other", false, false);
		document.mainform.subsubcat.options[7] = new Option("Discographies","discographies", false, false);
		document.mainform.subsubcat.options[8] = new Option("Festivals, concerts, and awards","festivals", false, false);
		document.mainform.subsubcat.options[9] = new Option("Genres","genres", false, false);
		document.mainform.subsubcat.options[10] = new Option("Hip-hop","hiphop-byname-ind", false, false);
		document.mainform.subsubcat.options[11] = new Option("Instruments","instruments-byname", false, false);
		document.mainform.subsubcat.options[12] = new Option("Jazz Performers","jazz-performers-byname", false, false);
		document.mainform.subsubcat.options[13] = new Option("Jazz venues","jazz-venues", false, false);
		document.mainform.subsubcat.options[14] = new Option("Jazz - other","jazz-other", false, false);
		document.mainform.subsubcat.options[15] = new Option("Orchestras","orchestras", false, false);
		document.mainform.subsubcat.options[16] = new Option("Orginizations","orginizations", false, false);
		document.mainform.subsubcat.options[17] = new Option("Producers, sound engineers, etc.","producers", false, false);
		document.mainform.subsubcat.options[18] = new Option("Record lables","recordlables", false, false);
		document.mainform.subsubcat.options[19] = new Option("Recording studios","recordingstudios", false, false);
		document.mainform.subsubcat.options[20] = new Option("Schools and music education","schools", false, false);
		document.mainform.subsubcat.options[21] = new Option("Songs","songs-byname-ind", false, false);
		document.mainform.subsubcat.options[22] = new Option("Stage musicals","stagemusicals", false, false);
		document.mainform.subsubcat.options[23] = new Option("Technical and business terms","techterms", false, false);
	}
	else if (scat=='10') { //National or ethnic cultures
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("All","all", false, false);
	}
	else if (scat=='11') { //Recreation and hobbies
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Gambling","gambling", false, false);
		document.mainform.subsubcat.options[2] = new Option("Games and Toys","gamestoys", false, false);
		document.mainform.subsubcat.options[3] = new Option("Radio controlled models","rc", false, false);
		document.mainform.subsubcat.options[4] = new Option("Role-playing games","rpg", false, false);
		document.mainform.subsubcat.options[5] = new Option("Simulation games","sim", false, false);
		document.mainform.subsubcat.options[6] = new Option("Other","other", false, false);
	}
	else if (scat=='12') { //Visual arts
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subsubcat.options[1] = new Option("Artistic schools","schools", false, false);
		document.mainform.subsubcat.options[2] = new Option("Visual artists","artists", false, false);
		document.mainform.subsubcat.options[3] = new Option("Artwork (artist known)","artwork-known", false, false);
		document.mainform.subsubcat.options[4] = new Option("Artwork (artist unknown)","artwork-unknown", false, false);
		document.mainform.subsubcat.options[5] = new Option("Museums and exhibitions","museums", false, false);
		document.mainform.subsubcat.options[6] = new Option("Comic book creators","cb-creators", false, false);
		document.mainform.subsubcat.options[7] = new Option("Comic book publishing companies","cb-pc", false, false);
		document.mainform.subsubcat.options[8] = new Option("Comic book titles and storylines","cb-title", false, false);
		document.mainform.subsubcat.options[9] = new Option("Web comics","cb-webcomics", false, false);
		document.mainform.subsubcat.options[10] = new Option("Comic book web sites","none", false, false);
		document.mainform.subsubcat.options[11] = new Option("Painting","painting", false, false);
		document.mainform.subsubcat.options[12] = new Option("Photography equipment","photography-equipment", false, false);
		document.mainform.subsubcat.options[13] = new Option("Photographers","photography-photographers", false, false);
		document.mainform.subsubcat.options[14] = new Option("Photographic film and materials","photography-film", false, false);
		document.mainform.subsubcat.options[15] = new Option("photography terms","photography-terms", false, false);
		document.mainform.subsubcat.options[16] = new Option("Photography workshops","photography-workshops", false, false);
		document.mainform.subsubcat.options[17] = new Option("Other photorgraphy topic","photography-other", false, false);
		document.mainform.subsubcat.options[18] = new Option("Sculpture topics","sculpture topics", false, false);
		document.mainform.subsubcat.options[19] = new Option("Sculptors","sculpture-sculptors", false, false);
		document.mainform.subsubcat.options[20] = new Option("Sculptures","sculpture-sculptors", false, false);
		document.mainform.subsubcat.options[21] = new Option("Other","other", false, false);
	}
	else if (scat=='13') { //Surrealism
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("All","nall", false, false);
	}
	else if (scat=='14') { //Other
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length=0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subsubcat.options[1] = new Option("Theatres","theatres", false, false);
		document.mainform.subsubcat.options[2] = new Option("Media networks and orginizations","mno", false, false);
	}
	else {
		document.mainform.subcat.options.length=0;
		subcat1.className='unhidden';
		subcat2.className='unhidden';
		document.mainform.subcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subcat.options[1] = new Option("Fashion","fashion", false, false);
		document.mainform.subcat.options[2] = new Option("Film, radio and television","film", false, false);
		document.mainform.subcat.options[3] = new Option("Food, drink, and nutrition","fdn", false, false);
		document.mainform.subcat.options[4] = new Option("Internet and tech culture","internet", false, false);
		document.mainform.subcat.options[5] = new Option("Literature","literature", false, false);
		document.mainform.subcat.options[6] = new Option("Performing arts","pa", false, false);
		document.mainform.subcat.options[7] = new Option("Print media","pm", false, false);
		document.mainform.subcat.options[8] = new Option("Museums","museums", false, false);
		document.mainform.subcat.options[9] = new Option("Music","music", false, false);
		document.mainform.subcat.options[10] = new Option("National or ethnic cultures","cultures", false, false);
		document.mainform.subcat.options[11] = new Option("Recreation and hobbies","hobbies", false, false);
		document.mainform.subcat.options[12] = new Option("Visual arts","va", false, false);
		document.mainform.subcat.options[13] = new Option("Surrealism","surreal",false,false);
		document.mainform.subcat.options[14] = new Option("Other","other", false, false);
	}
	}
else if (cat == '3') {
	if (scat == '1') { // Profession
		subsubcat1.className = "unhidden";
		subsubcat2.className = "unhidden";
		document.mainform.subsubcat.options.length = 0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subsubcat.options[1] = new Option("Academics","academics", false, false);
		document.mainform.subsubcat.options[2] = new Option("Activists","activists", false, false);
		document.mainform.subsubcat.options[3] = new Option("Actors","actors", false, false);
		document.mainform.subsubcat.options[4] = new Option("Adventurers, explorers and pioneers","adventurers-explorers-and-pioneers", false, false);
		document.mainform.subsubcat.options[5] = new Option("American Medal of Honor recipients","american-medal-of-honor-recipients", false, false);
		document.mainform.subsubcat.options[6] = new Option("Anglican/Episcopal religious figures","anglican/episcopal-religious-figures", false, false);
		document.mainform.subsubcat.options[7] = new Option("Anthropologists","anthropologists", false, false);
		document.mainform.subsubcat.options[8] = new Option("Archaeologists","archaeologists", false, false);
		document.mainform.subsubcat.options[9] = new Option("Architects","architects", false, false);
		document.mainform.subsubcat.options[10] = new Option("Astronomers","astronomers", false, false);
		document.mainform.subsubcat.options[11] = new Option("Authors (Fiction writers, dramatists and poets)","authors-(fiction-writers-dramatists-and-poets)", false, false);
		document.mainform.subsubcat.options[12] = new Option("Authors (Non-fiction writers)","authors-(non-fiction-writers)", false, false);
		document.mainform.subsubcat.options[13] = new Option("Baptist religious figures","baptist-religious-figures", false, false);
		document.mainform.subsubcat.options[14] = new Option("Biologists","biologists", false, false);
		document.mainform.subsubcat.options[15] = new Option("Botanists","botanists", false, false);
		document.mainform.subsubcat.options[16] = new Option("Boxers, martial artists and wrestlers","boxers-martial-artists-and-wrestlers", false, false);
		document.mainform.subsubcat.options[17] = new Option("Buddhism religious figures","buddhism-religious-figures", false, false);
		document.mainform.subsubcat.options[18] = new Option("Business people","business-people", false, false);
		document.mainform.subsubcat.options[19] = new Option("Catholicism religious figures","catholicism-religious-figures", false, false);
		document.mainform.subsubcat.options[20] = new Option("Chefs","chefs", false, false);
		document.mainform.subsubcat.options[21] = new Option("Chemists","chemists", false, false);
		document.mainform.subsubcat.options[22] = new Option("Choreographers","choreographers", false, false);
		document.mainform.subsubcat.options[23] = new Option("Comedians","comedians", false, false);
		document.mainform.subsubcat.options[24] = new Option("Computer-science people","computer-science-people", false, false);
		document.mainform.subsubcat.options[25] = new Option("Criminals","criminals", false, false);
		document.mainform.subsubcat.options[26] = new Option("Designers","designers", false, false);
		document.mainform.subsubcat.options[27] = new Option("Designers","designers", false, false);
		document.mainform.subsubcat.options[28] = new Option("Detectives and police","detectives-and-police", false, false);
		document.mainform.subsubcat.options[29] = new Option("Directors","directors", false, false);
		document.mainform.subsubcat.options[30] = new Option("Disc jockeys","disc-jockeys", false, false);
		document.mainform.subsubcat.options[31] = new Option("Documentary filmmakers","documentary-filmmakers", false, false);
		document.mainform.subsubcat.options[32] = new Option("Eastern Orthodox religious figures","eastern-orthodox-religious-figures", false, false);
		document.mainform.subsubcat.options[33] = new Option("Educators","educators", false, false);
		document.mainform.subsubcat.options[34] = new Option("Engineers","engineers", false, false);
		document.mainform.subsubcat.options[35] = new Option("Engravers","engravers", false, false);
		document.mainform.subsubcat.options[36] = new Option("Entertainers","entertainers", false, false);
		document.mainform.subsubcat.options[37] = new Option("Entertainment-business people","entertainment-business-people", false, false);
		document.mainform.subsubcat.options[38] = new Option("Environmentalists","environmentalists", false, false);
		document.mainform.subsubcat.options[39] = new Option("Espionage and intelligence","espionage-and-intelligence", false, false);
		document.mainform.subsubcat.options[40] = new Option("Fashion","fashion", false, false);
		document.mainform.subsubcat.options[41] = new Option("Feminist figures","feminist-figures", false, false);
		document.mainform.subsubcat.options[42] = new Option("Folklorists","folklorists", false, false);
		document.mainform.subsubcat.options[43] = new Option("Fundamentalist Latter-Day Saints religious figures","fundamentalist-latter-day-saints-religious-figures", false, false);
		document.mainform.subsubcat.options[44] = new Option("Game players","game-players", false, false);
		document.mainform.subsubcat.options[45] = new Option("Geographers","geographers", false, false);
		document.mainform.subsubcat.options[46] = new Option("Graphic artists","graphic-artists", false, false);
		document.mainform.subsubcat.options[47] = new Option("Hinduism religious figures","hinduism-religious-figures", false, false);
		document.mainform.subsubcat.options[48] = new Option("Historians","historians", false, false);
		document.mainform.subsubcat.options[49] = new Option("Illustrators","illustrators", false, false);
		document.mainform.subsubcat.options[50] = new Option("Inventors","inventors", false, false);
		document.mainform.subsubcat.options[51] = new Option("Islam religious figures","islam-religious-figures", false, false);
		document.mainform.subsubcat.options[52] = new Option("Journalists","journalists", false, false);
		document.mainform.subsubcat.options[53] = new Option("Judaism religious figures","judaism-religious-figures", false, false);
		document.mainform.subsubcat.options[54] = new Option("LGBT (lesbian, gay, bisexual, transgender) figures","lgbt-(lesbian-gay-bisexual-transgender)-figures", false, false);
		document.mainform.subsubcat.options[55] = new Option("Law","law", false, false);
		document.mainform.subsubcat.options[56] = new Option("Lawyers","lawyers", false, false);
		document.mainform.subsubcat.options[57] = new Option("Linguists","linguists", false, false);
		document.mainform.subsubcat.options[58] = new Option("Magicians","magicians", false, false);
		document.mainform.subsubcat.options[59] = new Option("Maritime figures","maritime-figures", false, false);
		document.mainform.subsubcat.options[60] = new Option("Mathematicians","mathematicians", false, false);
		document.mainform.subsubcat.options[61] = new Option("Medical people","medical-people", false, false);
		document.mainform.subsubcat.options[62] = new Option("Military figures","military-figures", false, false);
		document.mainform.subsubcat.options[63] = new Option("Models","models", false, false);
		document.mainform.subsubcat.options[64] = new Option("Musical-instrument makers","musical-instrument-makers", false, false);
		document.mainform.subsubcat.options[65] = new Option("Musicians","musicians", false, false);
		document.mainform.subsubcat.options[66] = new Option("Natural scientists, other","natural-scientists-other", false, false);
		document.mainform.subsubcat.options[67] = new Option("New-age spirituality religious figures","new-age-spirituality-religious-figures", false, false);
		document.mainform.subsubcat.options[68] = new Option("Non-denominational Christian religious figures","non-denominational-christian-religious-figures", false, false);
		document.mainform.subsubcat.options[69] = new Option("Ornithologists (birds)","ornithologists-(birds)", false, false);
		document.mainform.subsubcat.options[70] = new Option("Other filmmakers","other-filmmakers", false, false);
		document.mainform.subsubcat.options[71] = new Option("Other religious figures","other-religious-figures", false, false);
		document.mainform.subsubcat.options[72] = new Option("Painters","painters", false, false);
		document.mainform.subsubcat.options[73] = new Option("Pentecostal and charismatic religious figures","pentecostal-and-charismatic-religious-figures", false, false);
		document.mainform.subsubcat.options[74] = new Option("Performance artists","performance-artists", false, false);
		document.mainform.subsubcat.options[75] = new Option("Philanthropists","philanthropists", false, false);
		document.mainform.subsubcat.options[76] = new Option("Philosophers","philosophers", false, false);
		document.mainform.subsubcat.options[77] = new Option("Photographers","photographers", false, false);
		document.mainform.subsubcat.options[78] = new Option("Physicists","physicists", false, false);
		document.mainform.subsubcat.options[79] = new Option("Political figures","political-figures", false, false);
		document.mainform.subsubcat.options[80] = new Option("Pornography actors","pornography-actors", false, false);
		document.mainform.subsubcat.options[81] = new Option("Presbyterian, Reformed and Calvinism religious figures","presbyterian-reformed-and-calvinism-religious-figures", false, false);
		document.mainform.subsubcat.options[82] = new Option("Producers","producers", false, false);
		document.mainform.subsubcat.options[83] = new Option("Protestant religious figures","protestant-religious-figures", false, false);
		document.mainform.subsubcat.options[84] = new Option("Psychics","psychics", false, false);
		document.mainform.subsubcat.options[85] = new Option("Psychologists","psychologists", false, false);
		document.mainform.subsubcat.options[86] = new Option("Radio personalities","radio-personalities", false, false);
		document.mainform.subsubcat.options[87] = new Option("Screenwriters","screenwriters", false, false);
		document.mainform.subsubcat.options[88] = new Option("Sculptors","sculptors", false, false);
		document.mainform.subsubcat.options[89] = new Option("Shamanism religious figures","shamanism-religious-figures", false, false);
		document.mainform.subsubcat.options[90] = new Option("Singers","singers", false, false);
		document.mainform.subsubcat.options[91] = new Option("Sociologists religious figures","sociologists-religious-figures", false, false);
		document.mainform.subsubcat.options[92] = new Option("Sports figures","sports-figures", false, false);
		document.mainform.subsubcat.options[93] = new Option("Television personalities","television-personalities", false, false);
		document.mainform.subsubcat.options[94] = new Option("Unitarian Universalist religious figures","unitarian-universalist-religious-figures", false, false);
		document.mainform.subsubcat.options[95] = new Option("Wicca and witches religious figures","wicca-and-witches-religious-figures", false, false);
	}
	else if (scat == '2') { // Nationality
		subsubcat1.className = "unhidden";
		subsubcat2.className = "unhidden";
		document.mainform.subsubcat.options.length = 0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subsubcat.options[1] = new Option("Afghanistan","afghanistan", false, false);
		document.mainform.subsubcat.options[2] = new Option("Algeria","algeria", false, false);
		document.mainform.subsubcat.options[3] = new Option("Ancient Egypt","ancient-egypt", false, false);
		document.mainform.subsubcat.options[4] = new Option("Ancient Greece","ancient-greece", false, false);
		document.mainform.subsubcat.options[5] = new Option("Angola","angola", false, false);
		document.mainform.subsubcat.options[6] = new Option("Argentina","argentina", false, false);
		document.mainform.subsubcat.options[7] = new Option("Australia","australia", false, false);
		document.mainform.subsubcat.options[8] = new Option("Austria","austria", false, false);
		document.mainform.subsubcat.options[9] = new Option("Bahrain","bahrain", false, false);
		document.mainform.subsubcat.options[10] = new Option("Bangladesh","bangladesh", false, false);
		document.mainform.subsubcat.options[11] = new Option("Belgium","belgium", false, false);
		document.mainform.subsubcat.options[12] = new Option("Brazil","brazil", false, false);
		document.mainform.subsubcat.options[13] = new Option("Cambodia","cambodia", false, false);
		document.mainform.subsubcat.options[14] = new Option("Canada","canada", false, false);
		document.mainform.subsubcat.options[15] = new Option("Chile","chile", false, false);
		document.mainform.subsubcat.options[16] = new Option("China","china", false, false);
		document.mainform.subsubcat.options[17] = new Option("Czech Republic","czech-republic", false, false);
		document.mainform.subsubcat.options[18] = new Option("Denmark","denmark", false, false);
		document.mainform.subsubcat.options[19] = new Option("Finland","finland", false, false);
		document.mainform.subsubcat.options[20] = new Option("France","france", false, false);
		document.mainform.subsubcat.options[21] = new Option("Germany","germany", false, false);
		document.mainform.subsubcat.options[22] = new Option("Ghana","ghana", false, false);
		document.mainform.subsubcat.options[23] = new Option("Greenland","greenland", false, false);
		document.mainform.subsubcat.options[24] = new Option("Guam","guam", false, false);
		document.mainform.subsubcat.options[25] = new Option("Honduras","honduras", false, false);
		document.mainform.subsubcat.options[26] = new Option("Hong Kong","hong-kong", false, false);
		document.mainform.subsubcat.options[27] = new Option("Hungary","hungary", false, false);
		document.mainform.subsubcat.options[28] = new Option("Iceland","iceland", false, false);
		document.mainform.subsubcat.options[29] = new Option("India","india", false, false);
		document.mainform.subsubcat.options[30] = new Option("Indonesia","indonesia", false, false);
		document.mainform.subsubcat.options[31] = new Option("Ireland","ireland", false, false);
		document.mainform.subsubcat.options[32] = new Option("Italy","italy", false, false);
		document.mainform.subsubcat.options[33] = new Option("Japan","japan", false, false);
		document.mainform.subsubcat.options[34] = new Option("Kenya","kenya", false, false);
		document.mainform.subsubcat.options[35] = new Option("Lebanon","lebanon", false, false);
		document.mainform.subsubcat.options[36] = new Option("Malawi","malawi", false, false);
		document.mainform.subsubcat.options[37] = new Option("Malaysia","malaysia", false, false);
		document.mainform.subsubcat.options[38] = new Option("Mauritius","mauritius", false, false);
		document.mainform.subsubcat.options[39] = new Option("Mexico","mexico", false, false);
		document.mainform.subsubcat.options[40] = new Option("Modern Egypt","modern-egypt", false, false);
		document.mainform.subsubcat.options[41] = new Option("Modern Greece","modern-greece", false, false);
		document.mainform.subsubcat.options[42] = new Option("Myanmar","myanmar", false, false);
		document.mainform.subsubcat.options[43] = new Option("Namibia","namibia", false, false);
		document.mainform.subsubcat.options[44] = new Option("Netherlands","netherlands", false, false);
		document.mainform.subsubcat.options[45] = new Option("New Zealand","new-zealand", false, false);
		document.mainform.subsubcat.options[46] = new Option("Nigeria","nigeria", false, false);
		document.mainform.subsubcat.options[47] = new Option("North Korea","north-korea", false, false);
		document.mainform.subsubcat.options[48] = new Option("Norway","norway", false, false);
		document.mainform.subsubcat.options[49] = new Option("Pakistan","pakistan", false, false);
		document.mainform.subsubcat.options[50] = new Option("Palestine","palestine", false, false);
		document.mainform.subsubcat.options[51] = new Option("Papua New Guinea","papua-new-guinea", false, false);
		document.mainform.subsubcat.options[52] = new Option("Philippines","philippines", false, false);
		document.mainform.subsubcat.options[53] = new Option("Poland","poland", false, false);
		document.mainform.subsubcat.options[54] = new Option("Portugal","portugal", false, false);
		document.mainform.subsubcat.options[55] = new Option("Romania","romania", false, false);
		document.mainform.subsubcat.options[56] = new Option("Russia","russia", false, false);
		document.mainform.subsubcat.options[57] = new Option("Serbia","serbia", false, false);
		document.mainform.subsubcat.options[58] = new Option("Singapore","singapore", false, false);
		document.mainform.subsubcat.options[59] = new Option("Slovenia","slovenia", false, false);
		document.mainform.subsubcat.options[60] = new Option("Somalia","somalia", false, false);
		document.mainform.subsubcat.options[61] = new Option("South Africa","south-africa", false, false);
		document.mainform.subsubcat.options[62] = new Option("South Korea","south-korea", false, false);
		document.mainform.subsubcat.options[63] = new Option("Spain","spain", false, false);
		document.mainform.subsubcat.options[64] = new Option("Sri Lanka","sri-lanka", false, false);
		document.mainform.subsubcat.options[65] = new Option("Sudan","sudan", false, false);
		document.mainform.subsubcat.options[66] = new Option("Sweden","sweden", false, false);
		document.mainform.subsubcat.options[67] = new Option("Switzerland","switzerland", false, false);
		document.mainform.subsubcat.options[68] = new Option("Syria","syria", false, false);
		document.mainform.subsubcat.options[69] = new Option("Taiwan","taiwan", false, false);
		document.mainform.subsubcat.options[70] = new Option("Thailand","thailand", false, false);
		document.mainform.subsubcat.options[71] = new Option("Tibet","tibet", false, false);
		document.mainform.subsubcat.options[72] = new Option("Turkey","turkey", false, false);
		document.mainform.subsubcat.options[73] = new Option("Ukraine","ukraine", false, false);
		document.mainform.subsubcat.options[74] = new Option("United Kingdom","united-kingdom", false, false);
		document.mainform.subsubcat.options[75] = new Option("United States of America","united-states-of-america", false, false);
		document.mainform.subsubcat.options[76] = new Option("Vietnam","vietnam", false, false);
	}
	else {
		document.mainform.subcat.options.length=0;
		subcat1.className='unhidden';
		subcat2.className='unhidden';
		document.mainform.subcat.options[0] = new Option("Please choose one","none", false, false);
		document.mainform.subcat.options[1] = new Option("By profession","profession", false, false);
		document.mainform.subcat.options[2] = new Option("By nationality","nationality", false, false);
	}
	}
else if (cat == '4') { //Business and economics
	if (scat==1) { //Business
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none",false,true);
		document.mainform.subsubcat.options[1] = new Option("Companies","companies-byname",false,false);
		document.mainform.subsubcat.options[2] = new Option("Human Resources","hr",false,false);
		document.mainform.subsubcat.options[3] = new Option("Law firms","lawfirms",false,false);
		document.mainform.subsubcat.options[4] = new Option("Management","management",false,false);
		document.mainform.subsubcat.options[5] = new Option("Non-profits","nonprofits-byname",false,false);
		document.mainform.subsubcat.options[6] = new Option("Business terminology","terminology",false,false);
		document.mainform.subsubcat.options[7] = new Option("Other","other",false,false);
	}
	else if (scat==2) { //Cooperatives
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.classname = 'unhidden';
		subsubcat2.classname = 'unhidden';
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none",false,true);
		document.mainform.subsubcat.options[1] = new Option("Agricultural cooperatives","agricultural",false,false);
		document.mainform.subsubcat.options[2] = new Option("Cooperative organisers","organisers",false,false);
		document.mainform.subsubcat.options[3] = new Option("Cooperative banks & credit unions","banks",false,false);
		document.mainform.subsubcat.options[4] = new Option("Cooperative federations","federations",false,false);
		document.mainform.subsubcat.options[5] = new Option("Cooperative movement","movement",false,false);
		document.mainform.subsubcat.options[6] = new Option("Consumer and food cooperatives","consumer",false,false);
		document.mainform.subsubcat.options[7] = new Option("Housing cooperatives","housing",false,false);
		document.mainform.subsubcat.options[8] = new Option("Utility cooperatives","utility",false,false);
		document.mainform.subsubcat.options[9] = new Option("Worker cooperatives","worker",false,false);
		document.mainform.subsubcat.options[10] = new Option("Other","other",false,false);
	}
	else if (scat==3) { //Economics
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.classname = 'unhidden';
		subsubcat2.classname = 'unhidden';
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none",false,true);
		document.mainform.subsubcat.options[1] = new Option("Econometrics","econometrics",false,false);
		document.mainform.subsubcat.options[2] = new Option("Economic policy","economic",false,false);
		document.mainform.subsubcat.options[3] = new Option("Economic theory and history","theory-byname",false,false);
		document.mainform.subsubcat.options[4] = new Option("Economists","economists",false,false);
		document.mainform.subsubcat.options[5] = new Option("Terminology","terminology",false,false);
		document.mainform.subsubcat.options[6] = new Option("Other","other",false,false);
		//
	}
	else if (scat==4) { //Finance
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("By Name","byname",false,true);
	}
	else {
	  document.mainform.subcat.options.length=0;
	  subcat1.className='unhidden';
	  subcat2.className='unhidden';
	  document.mainform.subcat.options[0] = new Option("Please choose one",'none', false, true);
	  document.mainform.subcat.options[1] = new Option("Business","business",false,false);
	  document.mainform.subcat.options[2] = new Option("Cooperatives","cooperatives",false,false);
	  document.mainform.subcat.options[3] = new Option("Economics","economics",false,false);
	  document.mainform.subcat.options[4] = new Option("Finance","finance",false,false);
	}
	}
else if (cat == '5') { //Mathematics
	if (scat==40) { //Mathemiticians
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length = 0;
		document.mainform.subsubcat.options[0] = new Option("Byname","byname",true,false);
	}
	else if (scat==38) { //Mathematical logic
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length = 0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one",'none',false,true);
		document.mainform.subsubcat.options[1] = new Option("Model theory, proof theory, and recursion theory","model",false,false);
		document.mainform.subsubcat.options[2] = new Option("Set Theory","set",false,false);
		document.mainform.subsubcat.options[3] = new Option("Set Theory relations","setrelations",false,false);
		document.mainform.subsubcat.options[4] = new Option("Other","other",false,false);
	}
	else if (scat==45) { //Number Theory
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options.length = 0;
		document.mainform.subsubcat.options[0] = new Option("Please choose one",'none',false,true);
		document.mainform.subsubcat.options[1] = new Option("Elementary number theory","elementary",false,false);
		document.mainform.subsubcat.options[2] = new Option("Algebraic number theory","algebraic",false,false);
		document.mainform.subsubcat.options[3] = new Option("Analytic number theory","analytic",false,false);
	}
	else if (scat==58) { // Topology
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none",true,false);
		document.mainform.subsubcat.options[1] = new Option("Algebraic topology","algebraic",false,false);
		document.mainform.subsubcat.options[2] = new Option("General topology","general",false,false);
		document.mainform.subsubcat.options[3] = new Option("Geometric topology","geometric",false,false);
		document.mainform.subsubcat.options[4] = new Option("Knot theory","knot",false,false);
		document.mainform.subsubcat.options[5] = new Option("Set-theoretic topology","set",false,false);
		document.mainform.subsubcat.options[6] = new Option("Stable homotopy theory","stable",false,false);
	}
	else if (scat != 0) { // Others
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options.length = 0;
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else {
		document.mainform.subcat.options.length=0;
		subcat1.className='unhidden';
		subcat2.className='unhidden';
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subcat.options[1] = new Option("Abstract algebra","abstract-algebra", false, false);
		document.mainform.subcat.options[2] = new Option("Algebraic geometry","algebraic-geometry", false, false);
		document.mainform.subcat.options[3] = new Option("Algebraic number theory","algebraic-number-theory", false, false);
		document.mainform.subcat.options[4] = new Option("Algebraic topology","algebraic-topology", false, false);
		document.mainform.subcat.options[5] = new Option("Analytic number theory","analytic-number-theory", false, false);
		document.mainform.subcat.options[6] = new Option("Applied mathematics","applied-mathematics", false, false);
		document.mainform.subcat.options[7] = new Option("Arithmetic geometry","arithmetic-geometry", false, false);
		document.mainform.subcat.options[8] = new Option("Calculus of variations","calculus-of-variations", false, false);
		document.mainform.subcat.options[9] = new Option("Category theory","category-theory", false, false);
		document.mainform.subcat.options[10] = new Option("Coding theory","coding-theory", false, false);
		document.mainform.subcat.options[11] = new Option("Combinatorics","combinatorics", false, false);
		document.mainform.subcat.options[12] = new Option("Complex analysis","complex-analysis", false, false);
		document.mainform.subcat.options[13] = new Option("Complexity theory","complexity-theory", false, false);
		document.mainform.subcat.options[14] = new Option("Convex analysis / Optimization","convex-analysis-/-optimization", false, false);
		document.mainform.subcat.options[15] = new Option("Cryptography","cryptography", false, false);
		document.mainform.subcat.options[16] = new Option("Deformation theory","deformation-theory", false, false);
		document.mainform.subcat.options[17] = new Option("Differential equations","differential-equations", false, false);
		document.mainform.subcat.options[18] = new Option("Differential geometry and topology","differential-geometry-and-topology", false, false);
		document.mainform.subcat.options[19] = new Option("Dynamical systems","dynamical-systems", false, false);
		document.mainform.subcat.options[20] = new Option("Elementary arithmetic","elementary-arithmetic", false, false);
		document.mainform.subcat.options[21] = new Option("Elementary number theory","elementary-number-theory", false, false);
		document.mainform.subcat.options[22] = new Option("Functional analysis","functional-analysis", false, false);
		document.mainform.subcat.options[23] = new Option("Galois theory","galois-theory", false, false);
		document.mainform.subcat.options[24] = new Option("Game theory","game-theory", false, false);
		document.mainform.subcat.options[25] = new Option("General topology","general-topology", false, false);
		document.mainform.subcat.options[26] = new Option("Geometric topology","geometric-topology", false, false);
		document.mainform.subcat.options[27] = new Option("Geometry","geometry", false, false);
		document.mainform.subcat.options[28] = new Option("Graph theory","graph-theory", false, false);
		document.mainform.subcat.options[29] = new Option("Group theory","group-theory", false, false);
		document.mainform.subcat.options[30] = new Option("Harmonic analysis","harmonic-analysis", false, false);
		document.mainform.subcat.options[31] = new Option("History of mathematics and other cultural aspects","history-of-mathematics-and-other-cultural-aspects", false, false);
		document.mainform.subcat.options[32] = new Option("Homological algebra","homological-algebra", false, false);
		document.mainform.subcat.options[33] = new Option("K theory","k-theory", false, false);
		document.mainform.subcat.options[34] = new Option("Knot theory","knot-theory", false, false);
		document.mainform.subcat.options[35] = new Option("Lie groups, Algebraic groups / Lie algebras","lie-groups-algebraic-groups-/-lie-algebras", false, false);
		document.mainform.subcat.options[36] = new Option("Linear algebra","linear-algebra", false, false);
		document.mainform.subcat.options[37] = new Option("Mathematical analysis","mathematical-analysis", false, false);
		document.mainform.subcat.options[38] = new Option("Mathematical logic","mathematical-logic", false, false);
		document.mainform.subcat.options[39] = new Option("Mathematical physics","mathematical-physics", false, false);
		document.mainform.subcat.options[40] = new Option("Mathematicians","mathematicians", false, false);
		document.mainform.subcat.options[41] = new Option("Mathematics education","mathematics-education", false, false);
		document.mainform.subcat.options[42] = new Option("Matrices","matrices", false, false);
		document.mainform.subcat.options[43] = new Option("Measure theory","measure-theory", false, false);
		document.mainform.subcat.options[44] = new Option("Noncommutative geometry","noncommutative-geometry", false, false);
		document.mainform.subcat.options[45] = new Option("Number Theory","numbertheory",false,false);
		document.mainform.subcat.options[46] = new Option("Numerical analysis","numerical-analysis", false, false);
		document.mainform.subcat.options[47] = new Option("Order theory","order-theory", false, false);
		document.mainform.subcat.options[48] = new Option("Other","other", false, false);
		document.mainform.subcat.options[49] = new Option("Probability theory","probability-theory", false, false);
		document.mainform.subcat.options[50] = new Option("Real analysis","real-analysis", false, false);
		document.mainform.subcat.options[51] = new Option("Recreational mathematics","recreational-mathematics", false, false);
		document.mainform.subcat.options[52] = new Option("Representation theory (incl. harmonic analysis)","representation-theory-(incl.-harmonic-analysis)", false, false);
		document.mainform.subcat.options[53] = new Option("Semigroup theory","semigroup-theory", false, false);
		document.mainform.subcat.options[54] = new Option("Set-theoretic topology","set-theoretic-topology", false, false);
		document.mainform.subcat.options[55] = new Option("Special functions","special-functions", false, false);
		document.mainform.subcat.options[56] = new Option("Stable homotopy theory","stable-homotopy-theory", false, false);
		document.mainform.subcat.options[57] = new Option("Statistics","statistics", false, false);
		document.mainform.subcat.options[58] = new Option("Topology","topology", false, false);
		document.mainform.subcat.options[59] = new Option("Statistics","statistics", false, false);
	}
}
else if (cat == '6') { //Music
	if (scat == 1) { // Bands, performers, and songwriters
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("By Name","byname",true,false);
	}
	else if (scat == 2) { // Classical Composers
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("By Name","byname",true,false);
	}
	else if (scat == 3) { // Classical Compositions
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("By Name","byname",true,false);
	}
	else if (scat == 4) { // Conductors
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("All","all",true,false);
	}
	else if (scat == 5) { //Critics, historians, journalists, and publications
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none",true,false);
		document.mainform.subsubcat.options[1] = new Option("People","people",false,false);
		document.mainform.subsubcat.options[2] = new Option("Other","other",false,false);
	}
	else if (scat == 6) { // Disographies
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("All","all",true,false);
	}
	else if (scat == 7) { // Festivals, concerts, and awards
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("All","all",true,false);
	}
	else if (scat == 8) { //Genres
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'unhidden';
		subsubcat2.className = 'unhidden';
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none",true,false);
	}
	else if (scat == 9) { // Hip-hop
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("By name","byname",true,false);
	}
	else if (scat == 10) { // Instruments
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("By name","byname",true,false);
	}
	else if (scat == 11) { // Jazz
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("By name","byname",true,false);
	}
	else if (scat == 12) { // Music Theory
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("All","all",true,false);
	}
	else if (scat == 13) { // Orchestras
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 14) { // Orgenizations
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 13) { // Orchestras
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 14) { // Orginizations
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 15) { // Producers, sound engineers, etc
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 16) { // Record Labels
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 17) { // Recording Studios
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 18) { // Schools and Music Education
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 19) { // Songs
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("By name","byname",true,false);
	}
	else if (scat == 20) { // Stage Musicals
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else if (scat == 21) { // Technical and business terms
		document.mainform.subsubcat.options.length = 0;
		subsubcat1.className = 'hidden';
		subsubcat2.className = 'hidden';
		document.mainform.subsubcat.options[0] = new Option("all","all",true,false);
	}
	else {
		document.mainform.subcat.options.length=0;
		subcat1.className='unhidden';
		subcat2.className='unhidden';
		document.mainform.subsubcat.options[0] = new Option("Please choose one","none", true, false);
		document.mainform.subsubcat.options[1] = new Option("Bands, performers and songwriters","bands-performers-and-songwriters", false, false);
		document.mainform.subsubcat.options[2] = new Option("Classical composers","classical-composers", false, false);
		document.mainform.subsubcat.options[3] = new Option("Classical compositions","classical-compositions", false, false);
		document.mainform.subsubcat.options[4] = new Option("Conductors","conductors", false, false);
		document.mainform.subsubcat.options[5] = new Option("Critics, historians, journalists, and publications","critics-historians-journalists-and-publications", false, false);
		document.mainform.subsubcat.options[6] = new Option("Discographies","discographies", false, false);
		document.mainform.subsubcat.options[7] = new Option("Festivals, concerts and awards","festivals-concerts-and-awards", false, false);
		document.mainform.subsubcat.options[8] = new Option("Genres","genres", false, false);
		document.mainform.subsubcat.options[9] = new Option("Hip hop","hip-hop", false, false);
		document.mainform.subsubcat.options[10] = new Option("Instruments","instruments", false, false);
		document.mainform.subsubcat.options[11] = new Option("Jazz","jazz", false, false);
		document.mainform.subsubcat.options[12] = new Option("Music theory","music-theory", false, false);
		document.mainform.subsubcat.options[13] = new Option("Orchestras","orchestras", false, false);
		document.mainform.subsubcat.options[14] = new Option("Organizations","organizations", false, false);
		document.mainform.subsubcat.options[15] = new Option("Producers, sound engineers, etc.","producers-sound-engineers-etc.", false, false);
		document.mainform.subsubcat.options[16] = new Option("Record labels","record-labels", false, false);
		document.mainform.subsubcat.options[17] = new Option("Recording studios","recording-studios", false, false);
		document.mainform.subsubcat.options[18] = new Option("Schools and music education","schools-and-music-education", false, false);
		document.mainform.subsubcat.options[19] = new Option("Songs","songs", false, false);
		document.mainform.subsubcat.options[20] = new Option("Stage musicals","stage-musicals", false, false);
		document.mainform.subsubcat.options[21] = new Option("Technical and business terms","technical-and-business-terms", false, false);
	}
	}
else if (cat == '7') {
	document.mainform.subcat.options.length=0;
	subcat1.className='unhidden';
	subcat2.className='unhidden';
	document.mainform.subcat.options[0] = new Option("Please choose one","none", false, false);
	document.mainform.subcat.options[1] = new Option("Astronomy and cosmology","astronomy", false, false);
	document.mainform.subcat.options[2] = new Option("Biology","biology", false, false);
	document.mainform.subcat.options[3] = new Option("Chemistry, chemicals and labs","chemistry", false, false);
	document.mainform.subcat.options[4] = new Option("Environment and geology","environment", false, false);
	document.mainform.subcat.options[5] = new Option("Journals and trade publications","journals", false, false);
	document.mainform.subcat.options[6] = new Option("Materials science","materials", false, false);
	document.mainform.subcat.options[7] = new Option("Medicine","medicine", false, false);
	document.mainform.subcat.options[8] = new Option("Physical science","physicalsicence", false, false);
	document.mainform.subcat.options[9] = new Option("Physics","Physics", false, false);
	document.mainform.subcat.options[10] = new Option("Scientists and people in science","people", false, false);
	document.mainform.subcat.options[11] = new Option("Other","other", false, false);
	}
else if (cat == '8') {
	document.mainform.subcat.options.length=0;
	subcat1.className='unhidden';
	subcat2.className='unhidden';
	document.mainform.subcat.options[0] = new Option("Please choose one","none", false, false);
	document.mainform.subcat.options[1] = new Option("Aesthetics","aesthetics", false, false);
	document.mainform.subcat.options[2] = new Option("Epistemology","epistemology", false, false);
	document.mainform.subcat.options[3] = new Option("Ethics","ethics", false, false);
	document.mainform.subcat.options[4] = new Option("Logic","logic", false, false);
	document.mainform.subcat.options[5] = new Option("Metaphysics","metaphysics", false, false);
	document.mainform.subcat.options[6] = new Option("Other","other", false, false);
	}
else if (cat == '9') {
	document.mainform.subcat.options.length=0;
	subcat1.className='unhidden';
	subcat2.className='unhidden';
	document.mainform.subcat.options[0] = new Option("Please choose one","none", false, false);
	document.mainform.subcat.options[1] = new Option("Archaeology","archaeology", false, false);
	document.mainform.subcat.options[2] = new Option("Genealogy","genealogy", false, false);
	document.mainform.subcat.options[3] = new Option("Geography, cities, regions and named places","geography", false, false);
	document.mainform.subcat.options[4] = new Option("Historic places","historicplaces", false, false);
	document.mainform.subcat.options[5] = new Option("History","history", false, false);
	document.mainform.subcat.options[6] = new Option("Linguistics","linguistics", false, false);
	document.mainform.subcat.options[7] = new Option("Military and military history","military", false, false);
	document.mainform.subcat.options[8] = new Option("Politics and government","politics", false, false);
	document.mainform.subcat.options[9] = new Option("Psychology","psychology", false, false);
	document.mainform.subcat.options[10] = new Option("Religion","religion", false, false);
	document.mainform.subcat.options[11] = new Option("Society and culture","society", false, false);
	document.mainform.subcat.options[12] = new Option("Other social sciences topics","other", false, false);
	}
else if (cat == '10') {
	document.mainform.subcat.options.length=0;
	subcat1.className='unhidden';
	subcat2.className='unhidden';
	document.mainform.subcat.options[0] = new Option("Please choose one","none", false, false);
	document.mainform.subcat.options[1] = new Option("Sports and sportspeople","sports", false, false);
	document.mainform.subcat.options[2] = new Option("Association football (soccer)","soccer", false, false);
	document.mainform.subcat.options[3] = new Option("Martial arts","mma", false, false);
	document.mainform.subcat.options[4] = new Option("Motor sports","motor", false, false);
	}
else {
	subcat1.className='hidden';
	subcat2.className='hidden';
	subsubcat1.className='hidden';
	subsubcat2.className='hidden';
	document.mainform.subcat.options.length=0;
	document.mainform.subsubcat.options.length=0;
	}

}

function clearerror() {
	var subj = subject.className;
	var cat = category1.className;
	var scat = subcat1.className;
	var sscat = subsubcat1.className;
	if (subj == 'red') { subject.className = ''; }
	if (cat == 'red') { category1.className = ''; }
	if (scat == 'red') { subcat1.className = ''; }
	if (sscat == 'red') { subsubcat1.className = ''; }
	}

function validate() {
	clearerror();
	var subj=document.forms["mainform"]["subject"].value;
	var cat=document.forms["mainform"]["category"].value;
	var subcat=document.forms["mainform"]["subcat"].value;
	var subsubcat=document.forms["mainform"]["subsubcat"].value;
	var uname=document.forms["mainform"]["username"].value;
	var check=document.forms["mainform"]["doublecheck"].checked;
	if (subj==null || subj=="") {
		alert("Subject must be filled out!");
		subject.className='text-error';
		return false;
	}
	else if (cat==null || cat=="" || cat=="none") {
		alert("Please choose an article category!");
		category1.className='text-error';
		return false;
	}
	else if (subcat==null || subcat=="" || subcat=="none") {
		alert("Please choose an article sub-category!");
		subcat1.className='text-error';
		return false;
	}
	else if (subsubcat==null || subsubcat=="" || subsubcat=="none") {
		alert("Please choose an article sub-sub-category!");
		subsubcat1.className='text-error';
		return false;
	}
	//else if (check == false || check==null || check=='') {
	//	alert("Please read and agree to the agreement.");
	//	return false;
	//}
	else {
		return true;
	}
}

function checkbox() {
	var cb = document.mainform.doublecheck.checked;
	if (cb == false) {
		document.mainform.submit.disabled = true;
		}
	else{
		document.mainform.submit.disabled = false;
		}
	}

function checkusername() {
	var uname = document.mainform.username.value;
	uname = uname.replace(' ', '_');
	uname = uname.charAt(0).toUpperCase() + uname.slice(1);
	if (uname != '') {
		unameinfo.innerHTML = "<i class=\"icon-user\"></i><a href=\"http://en.wikipedia.org/wiki/User:" + uname + "\" target=_blank>" + uname + "</a> (<a href=\"http://en.wikipedia.org/wiki/User_talk:" + uname + "\" target=_blank>talk</a> &middot; <a href=\"http://en.wikipedia.org/wiki/Special:Contributions/" + uname + "\" target=_blank>contributions</a>)";
	}
	else {
		unameinfo.innerHTML = " ";
	}	
}

function resetform() {
	clearerror();
	subcat1.className='hidden';
	subcat2.className='hidden';
	subsubcat1.className='hidden';
	subsubcat2.className='hidden';
	document.mainform.subcat.options.length=0;
	document.mainform.subsubcat.options.length=0;
	document.mainform.submit.disabled=true;
	document.mainform.doublecheck.checked = false;
	unameinfo.innerHTML = " ";
	}
	
function loading() {
	parseform();
	checkbox();
	clearerror();
	checkusername();
	}