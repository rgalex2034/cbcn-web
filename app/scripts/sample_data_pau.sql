USE cbcn_web;
START TRANSACTION;

DELETE FROM `event`;
ALTER TABLE `event` AUTO_INCREMENT = 1;
DELETE FROM `group`;
ALTER TABLE `group` AUTO_INCREMENT = 1;
DELETE FROM `place`;
ALTER TABLE `place` AUTO_INCREMENT = 1;

/*Place sample data*/
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("5681 Malesuada Road","-69.66885","169.8786"),("749-2739 Malesuada Rd.","-21.26336","-76.26093"),("P.O. Box 829, 7361 Odio. Avenue","54.14191","56.57077"),("5372 Sociis Street","68.25106","1.18736"),("4148 Tortor, Street","-47.0591","154.41341"),("Ap #748-8815 Euismod Avenue","70.60341","-78.3599"),("487 Arcu. Av.","-84.89246","-58.62805"),("Ap #327-3066 Nec Ave","-41.40282","87.74881"),("6820 Vel, Rd.","75.86968","83.5248"),("P.O. Box 436, 7064 Tellus St.","-63.96833","-135.76922");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("P.O. Box 304, 7989 Laoreet Av.","76.98335","19.84262"),("231-5385 Morbi Ave","-57.79327","41.37396"),("715 Donec Av.","-0.93694","48.45026"),("Ap #132-9764 Erat. Road","35.3084","-147.4419"),("6225 Aliquet Street","-33.72352","-88.84253"),("Ap #115-1949 Ligula. Av.","-35.76837","89.56872"),("249-8762 Sed St.","-59.83658","-52.9637"),("7529 Nulla Rd.","36.00055","-165.19501"),("6093 Nam Rd.","87.11212","-104.15319"),("P.O. Box 687, 6956 Justo Street","-6.12508","51.93045");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("4924 Eget, Av.","34.21825","-98.14323"),("5872 Non, Av.","16.36155","-131.61987"),("P.O. Box 899, 398 Libero St.","-4.68371","-45.2476"),("218 Ornare, Ave","-31.40125","166.7421"),("3471 Fusce Ave","44.09477","34.19591"),("Ap #467-9747 A Road","5.9728","125.8403"),("P.O. Box 295, 4434 Blandit Rd.","-24.14548","41.92582"),("696-3843 Aliquet Road","-34.87761","73.97752"),("Ap #150-1780 Lacus Street","-42.77663","31.63864"),("Ap #448-2222 Nulla Av.","76.50821","-72.6706");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("Ap #977-648 Sed Road","83.57086","-171.41655"),("P.O. Box 261, 609 Ut St.","-63.32689","156.64867"),("858-1968 Pretium St.","-35.03665","30.94598"),("Ap #692-9124 Volutpat. Road","-15.43808","-114.67411"),("P.O. Box 686, 9677 Dui. St.","-87.91516","-152.04379"),("Ap #280-4985 Nulla St.","17.43854","-103.82772"),("379-5386 Ac St.","4.9586","-173.2452"),("525-8624 Nunc Street","-83.13126","37.21135"),("477 A, Street","-53.2733","-117.14964"),("Ap #962-6421 Consectetuer St.","-0.51247","-175.93002");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("P.O. Box 657, 8344 Ante, Rd.","43.85968","144.68323"),("P.O. Box 515, 3820 Aliquam Av.","-41.29074","93.50133"),("P.O. Box 144, 6498 Fusce Street","26.43956","95.0639"),("996-5786 Lectus Rd.","-54.84827","-113.52622"),("607-9178 Quisque Road","42.16405","-89.18252"),("Ap #621-3163 Nisi. Rd.","35.18331","-107.77997"),("4243 Pretium Road","-81.08104","73.46521"),("145 Diam. St.","26.91319","-36.13507"),("Ap #330-9942 Cursus, Street","4.95497","25.43371"),("905-1564 Lorem, Avenue","56.27844","120.09425");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("P.O. Box 561, 2647 Turpis Rd.","75.99963","107.21277"),("268-3525 Tincidunt, Av.","-40.00397","-30.58475"),("P.O. Box 626, 6784 Ac St.","-38.21966","121.68387"),("448-1601 Maecenas Rd.","62.2434","118.14668"),("P.O. Box 900, 8638 Nec Road","-83.76035","-25.70059"),("7620 Cras Street","-81.39543","99.0385"),("Ap #740-2764 Et Av.","8.22424","-173.13036"),("5863 Nisi Rd.","-73.2979","69.558"),("457-4518 Sociis Rd.","27.07347","124.69851"),("8475 Magna. St.","-66.63838","-142.00581");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("615-6553 Commodo Rd.","-65.90269","-86.08482"),("742 Cras St.","83.08493","75.74505"),("2013 Interdum Ave","-74.39361","68.04717"),("6944 Mauris Ave","-9.11372","48.22089"),("P.O. Box 623, 8160 Turpis. Avenue","77.89998","102.72329"),("Ap #594-6652 Vel, St.","55.26896","-57.01796"),("P.O. Box 919, 7153 Urna. Av.","60.45382","127.96973"),("P.O. Box 851, 7236 Ligula. St.","30.24294","-176.44252"),("P.O. Box 303, 3614 Amet Street","-74.11824","46.10411"),("857-3122 Elit Ave","-49.9521","-29.64213");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("5693 Tincidunt Rd.","-87.69611","40.71503"),("Ap #189-2251 Ac Street","-58.5718","164.99513"),("P.O. Box 923, 5823 Nulla St.","-30.56236","38.74836"),("P.O. Box 398, 7411 Primis Av.","51.73308","150.06438"),("758-4508 Et Avenue","-27.26719","24.02663"),("2955 Non Av.","38.53653","55.45813"),("Ap #392-8070 Ultrices Ave","-46.94254","-45.07128"),("1934 Nec, Street","-14.11526","-1.47767"),("P.O. Box 880, 2712 Eu Av.","29.12539","175.49563"),("Ap #621-2612 Non St.","54.91557","103.41785");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("9294 Diam. St.","65.24079","-111.05124"),("P.O. Box 291, 4724 Vel, St.","-74.91412","72.81576"),("Ap #685-7118 Auctor Street","-45.21804","-99.82509"),("703 Orci. Av.","-84.03449","152.94893"),("4615 Convallis Av.","31.87107","-112.64438"),("Ap #956-5377 Lobortis Street","56.58587","148.765"),("3771 Tortor St.","-24.2217","136.52038"),("576-7837 Mauris Avenue","23.24313","-144.71544"),("2080 Non Av.","-11.20124","49.95174"),("242-8664 Ultrices. Avenue","38.40041","-72.72229");
INSERT INTO `place` (`address`,`latitude`,`longitude`) VALUES ("2131 Nunc Av.","74.50504","130.41861"),("Ap #164-637 A, Avenue","-50.68387","117.95775"),("132-825 Quis St.","36.74773","-32.21577"),("884-3878 Felis. St.","-26.20721","71.16425"),("Ap #300-5727 Nisl Rd.","-53.3524","63.86921"),("1323 Purus Road","39.26626","-13.25221"),("933-6009 Lectus Street","67.00517","67.73885"),("P.O. Box 807, 3197 Metus Street","-14.42608","-79.90168"),("Ap #643-6050 Natoque Road","8.45089","161.69785"),("491-3597 Donec Road","-42.7479","45.74166");

/*Group sample data*/
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Curabitur Sed Tortor Consulting",1,"nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate","image_1","volutpat.Nulla.dignissim@Curabiturconsequatlectus.com","BA"),("Faucibus Ut Institute",2,"euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique","image_3","vel.arcu@ullamcorpervelitin.ca","Lubuskie"),("Tellus Sem Mollis LLC",3,"dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales","image_2","nulla.Cras.eu@sapienAenean.co.uk","Berlin"),("Dolor Tempus LLP",4,"tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna.","image_2","quis.lectus.Nullam@semperpretiumneque.com","E"),("Ultricies Sem Consulting",5,"mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec","image_3","neque.non@at.com","BR"),("Ligula Tortor Dictum Limited",6,"porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante.","image_1","iaculis.odio.Nam@ullamcorper.com","HH"),("Urna Justo Corporation",7,"Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem,","image_1","egestas.rhoncus.Proin@Proinvel.org","RS"),("Laoreet Corp.",8,"turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus","image_3","sed@Aeneangravida.com","Oklahoma"),("Non Ltd",9,"gravida. Aliquam tincidunt, nunc ac mattis ornare,","image_3","quam@vitaenibhDonec.net","Henegouwen"),("Nibh Aliquam Ornare Company",10,"eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius","image_3","consequat.nec.mollis@massalobortis.ca","Sląskie");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Dignissim Lacus Associates",11,"enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh","image_2","est@ornaretortorat.com","Diy"),("Facilisis Industries",12,"urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius.","image_1","suscipit.est.ac@elementumduiquis.net","AP"),("Amet Risus Industries",13,"lectus convallis est, vitae sodales nisi magna sed dui. Fusce","image_2","rhoncus.Proin.nisl@Quisquepurussapien.edu","Nebraska"),("Eu Sem Pellentesque Company",14,"turpis non enim. Mauris quis turpis vitae purus","image_1","Sed.auctor@natoquepenatibus.co.uk","Kentucky"),("Felis Ullamcorper Viverra Company",15,"semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non","image_1","orci.Ut.sagittis@diamPellentesquehabitant.edu","Araucanía"),("Dictum LLC",16,"ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu","image_2","facilisis.non@nonsapienmolestie.edu","AP"),("At Ltd",17,"turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris","image_3","mauris.Morbi.non@consectetuer.net","RA"),("Sed Est Nunc Industries",18,"Cras dictum ultricies ligula. Nullam enim. Sed","image_2","Aenean.egestas.hendrerit@nonummyac.com","Overijssel"),("Consequat Auctor Corp.",19,"sed libero. Proin sed turpis nec mauris","image_3","bibendum.fermentum.metus@gravidaAliquamtincidunt.net","Stockholms län"),("Montes Nascetur PC",20,"ante ipsum primis in faucibus orci luctus et","image_3","Integer.sem.elit@diam.ca","MD");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Imperdiet Corporation",21,"lorem ac risus. Morbi metus. Vivamus euismod","image_2","risus.Donec@Integersem.ca","CT"),("Sed Id Risus Incorporated",22,"quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam","image_2","eget.varius@Nunc.edu","Nebraska"),("Sollicitudin Corp.",23,"tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet,","image_1","pellentesque.eget@Nuncmauriselit.net","MP"),("Mauris Blandit Enim Corporation",24,"felis orci, adipiscing non, luctus sit amet,","image_3","scelerisque.dui@mauriseu.net","NB"),("Interdum Corporation",25,"tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at,","image_3","Sed.diam@telluseu.net","CAM"),("Nascetur Ridiculus Mus LLC",26,"Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi.","image_3","faucibus@nuncrisus.co.uk","Niger"),("Quam Vel Sapien Ltd",27,"venenatis lacus. Etiam bibendum fermentum metus. Aenean sed","image_2","lacus.Mauris.non@magnaPraesentinterdum.net","WB"),("Ac Mattis Ltd",28,"lorem ut aliquam iaculis, lacus pede sagittis","image_2","ac.eleifend.vitae@lacinia.edu","Extremadura"),("Eleifend Inc.",29,"quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia","image_1","dapibus.ligula@felisorciadipiscing.ca","Warmińsko-mazurskie"),("A Scelerisque Sed Ltd",30,"auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet","image_3","nunc@arcueu.co.uk","MA");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Tristique Aliquet Phasellus Associates",31,"eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus","image_2","dui.quis@nec.edu","EX"),("Elementum Dui Corp.",32,"vulputate, nisi sem semper erat, in consectetuer ipsum nunc id","image_1","metus.In@egestasrhoncusProin.net","Ist"),("Feugiat Inc.",33,"parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus.","image_1","neque.et.nunc@feugiat.co.uk","Florida"),("Vel Pede Blandit Institute",34,"sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis.","image_1","ipsum@semmollis.org","Catalunya"),("Est Ac LLP",35,"lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit","image_2","placerat@massa.com","GJ"),("Nec Associates",36,"magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque","image_1","enim@augue.com","LOM"),("Pharetra Corp.",37,"et netus et malesuada fames ac turpis egestas. Aliquam fringilla","image_2","Quisque.tincidunt.pede@uterosnon.co.uk","Bahia"),("Ridiculus Mus Proin Incorporated",38,"in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet,","image_1","diam@Sed.co.uk","Paraíba"),("Egestas A Ltd",39,"Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer","image_3","semper@tinciduntadipiscing.net","LD"),("Donec LLC",40,"ipsum porta elit, a feugiat tellus lorem eu","image_1","vitae@utquam.edu","FL");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Cursus Institute",41,"ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas","image_2","amet@pede.com","Hamburg"),("Donec Luctus Foundation",42,"et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse","image_2","purus.Nullam@ridiculus.edu","IX"),("Metus In Foundation",43,"adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing","image_3","elit.fermentum.risus@Fuscealiquamenim.co.uk","Louisiana"),("Orci Luctus Consulting",44,"facilisis eget, ipsum. Donec sollicitudin adipiscing ligula.","image_1","sagittis@Sedidrisus.net","WP"),("Feugiat Associates",45,"bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus,","image_2","amet@Morbi.edu","SK"),("Ipsum Corporation",46,"libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque","image_1","dapibus.ligula.Aliquam@mus.org","San José"),("Orci Consectetuer Consulting",47,"vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis","image_3","nisl@Quisqueimperdiet.com","Colorado"),("Metus LLP",48,"laoreet posuere, enim nisl elementum purus, accumsan interdum","image_1","feugiat.non@id.org","Zuid Holland"),("Nunc Sed Libero Ltd",49,"interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem","image_1","euismod.et@accumsanconvallis.com","Bretagne"),("Nam Ac Nulla Institute",50,"Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede.","image_3","lobortis.Class@ac.org","Namen");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Tristique Corporation",51,"Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis","image_3","ac@Nullamvelit.edu","Alberta"),("Ante Limited",52,"lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient","image_1","et.arcu@sem.com","Washington"),("Pede Company",53,"cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac","image_1","Donec.tincidunt@pharetraNam.net","Haute-Normandie"),("Ante Lectus Convallis Corp.",54,"eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien.","image_1","nec.tellus@musDonec.edu","Newfoundland and Labrador"),("Ac Feugiat Non LLP",55,"cursus non, egestas a, dui. Cras pellentesque.","image_1","ornare@sitametrisus.co.uk","Noord Holland"),("Pretium Aliquet Institute",56,"erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis","image_1","quis@velit.org","Haute-Normandie"),("Vestibulum Lorem Sit Company",57,"libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui.","image_2","Nulla@Cras.org","C"),("Suspendisse PC",58,"facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing,","image_1","mauris.Morbi@posuerevulputate.ca","San José"),("Cursus Corporation",59,"non, hendrerit id, ante. Nunc mauris sapien,","image_1","rutrum@Mauris.net","NI"),("Sem PC",60,"urna convallis erat, eget tincidunt dui augue eu tellus.","image_1","massa.Vestibulum.accumsan@massarutrummagna.org","ON");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Fringilla Cursus Purus Ltd",61,"justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in","image_2","malesuada@penatibus.co.uk","Western Australia"),("Mattis Velit Justo Consulting",62,"euismod mauris eu elit. Nulla facilisi. Sed","image_2","erat.semper.rutrum@nibhDonec.ca","SI"),("Lorem Eget Mollis Limited",63,"Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed","image_1","mauris@non.ca","AK"),("Suspendisse Inc.",64,"Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem","image_3","Etiam.ligula.tortor@placeratCrasdictum.ca","Istanbul"),("Velit Quisque Foundation",65,"ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat","image_3","Fusce.dolor.quam@gravida.ca","Luxemburg"),("Curabitur Egestas Corp.",66,"Pellentesque tincidunt tempus risus. Donec egestas. Duis ac","image_3","consectetuer.adipiscing@euismodin.org","Tamil Nadu"),("Nec Institute",67,"a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper","image_3","nibh@egestas.edu","Wie"),("Et Magnis Dis Consulting",68,"sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis","image_3","ligula.Aenean@magnaSuspendissetristique.co.uk","Salzburg"),("Pellentesque A Institute",69,"sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt","image_1","Donec.sollicitudin.adipiscing@ipsum.co.uk","NSW"),("Suspendisse Ltd",70,"cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis","image_1","in.molestie@vitaenibh.ca","CAM");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Cras Vulputate Velit Associates",71,"augue eu tellus. Phasellus elit pede, malesuada vel,","image_2","nascetur.ridiculus.mus@cursus.co.uk","RS"),("Ac Ipsum Phasellus LLP",72,"vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at","image_3","urna.Nullam.lobortis@ac.co.uk","New South Wales"),("Nibh LLP",73,"egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula","image_1","Morbi.vehicula.Pellentesque@molestiepharetranibh.edu","UP"),("Vitae Dolor Donec Industries",74,"eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et,","image_1","arcu.Vestibulum.ut@liberoProinsed.net","AB"),("Aenean Eget Magna Corp.",75,"senectus et netus et malesuada fames ac","image_2","nulla.Donec.non@amalesuadaid.edu","MU"),("Ante Nunc Mauris Inc.",76,"sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt","image_1","ullamcorper.Duis@Morbi.org","SAR"),("Vel Arcu PC",77,"mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing","image_3","eu.dolor.egestas@metus.edu","Vienna"),("Nullam Lobortis Industries",78,"varius ultrices, mauris ipsum porta elit, a feugiat","image_3","gravida.non@vitaediamProin.edu","MG"),("In Tincidunt Associates",79,"mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate,","image_3","diam@eu.net","OK"),("Mauris Rhoncus Id Institute",80,"orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue.","image_2","non@etlacinia.com","San José");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Dolor Donec Industries",81,"vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus","image_1","dictum.augue.malesuada@laciniamattis.com","SJ"),("Lectus Convallis Company",82,"a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi.","image_3","pharetra.ut@acarcu.net","Wie"),("Lectus PC",83,"enim. Nunc ut erat. Sed nunc est,","image_1","Phasellus@elit.edu","Texas"),("Risus Donec Nibh Limited",84,"sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo.","image_1","tincidunt.nibh.Phasellus@nasceturridiculus.co.uk","Vienna"),("Malesuada Vel Venenatis Industries",85,"consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et","image_1","eu@Quisqueporttitoreros.ca","CE"),("Velit Corporation",86,"vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo.","image_1","urna.Ut@facilisisloremtristique.net","QC"),("Cursus Integer Mollis Industries",87,"bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed","image_3","fringilla.cursus@enimEtiam.ca","Assam"),("Eget Mollis Lectus Industries",88,"malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna.","image_3","ligula.Donec.luctus@eros.org","Paraná"),("Vitae Erat Institute",89,"massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet","image_3","Curae.Phasellus@utaliquamiaculis.net","British Columbia"),("Vel Corp.",90,"eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis","image_1","Cras.sed.leo@necorci.ca","HB");
INSERT INTO `group` (`name`,`place`,`description`,`url_image`,`contact_email`,`district`) VALUES ("Velit Dui Foundation",91,"imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,","image_1","tellus.imperdiet@dapibusid.ca","Noord Holland"),("Nam Consequat Company",92,"magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus.","image_2","pretium@anteblandit.edu","Ktn"),("Elit Pharetra Ut Inc.",93,"cursus non, egestas a, dui. Cras pellentesque.","image_2","mauris.aliquam.eu@vitaerisusDuis.edu","Andhra Pradesh"),("Lacus Mauris Corporation",94,"fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla","image_3","Cras@egetlaoreet.co.uk","Ist"),("Ac Consulting",95,"placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel","image_1","varius@Morbiquis.net","RM"),("Est Congue Industries",96,"Donec nibh enim, gravida sit amet, dapibus id,","image_3","dolor.sit@non.edu","WP"),("Quis Inc.",97,"enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis","image_2","ante.lectus@dolor.com","NA"),("Ut Molestie In Industries",98,"velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque.","image_2","gravida.non.sollicitudin@Proin.net","Noord Holland"),("Sollicitudin Orci Foundation",99,"Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec","image_3","vitae@libero.org","Zeeland"),("Ligula Tortor Corp.",100,"cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna.","image_1","Curabitur.sed@imperdieterat.edu","Zeeland");

/*Event sample data*/
INSERT INTO `event` (`name`,`date`,`place`,`url`,`image_full`,`image_low`,`contact_email`,`group`) VALUES
("Cum Sociis Foundation","2019-03-30 16:24:22",23,"http://www.google.es","https://pausabe.com/apps/CBCN/images/prova1.jpg","https://pausabe.com/apps/CBCN/images/provaLQ1.jpg","ligula.Aliquam@tinciduntpede.com",40),
("Cursus Nunc Mauris Ltd","2018-03-17 11:12:22",29,"www.youtube.com","https://pausabe.com/apps/CBCN/images/prova2.jpg","https://pausabe.com/apps/CBCN/images/provaLQ2.jpg","Donec.sollicitudin.adipiscing@acturpisegestas.com",97),
("Tincidunt Congue Limited","2019-05-08 23:57:30",78,"www.google.com","https://pausabe.com/apps/CBCN/images/prova3.jpg","https://pausabe.com/apps/CBCN/images/provaLQ3.jpg","Aenean@Donectempus.org",54),
("Euismod Ac Fermentum Incorporated","2017-10-30 10:02:51",76,"http://www.google.es","https://pausabe.com/apps/CBCN/images/prova4.jpg","https://pausabe.com/apps/CBCN/images/provaLQ4.jpg","semper@ategestasa.com",2),
("Natoque Penatibus Et Institute","2018-03-28 15:17:30",99,"http://www.google.es","https://pausabe.com/apps/CBCN/images/prova5.jpg","https://pausabe.com/apps/CBCN/images/provaLQ5.jpg","ligula.Aliquam.erat@pede.ca",22),
("Commodo Ipsum Suspendisse Institute","2017-08-20 21:54:59",12,"http://www.google.es","https://pausabe.com/apps/CBCN/images/prova6.jpg","https://pausabe.com/apps/CBCN/images/provaLQ6.jpg","nunc.ac.mattis@Donecnibh.com",22),
("Semper Et Lacinia Industries","2019-07-21 03:29:29",56,"http://www.google.es","https://pausabe.com/apps/CBCN/images/prova7.jpg","https://pausabe.com/apps/CBCN/images/provaLQ7.jpg","molestie@loremvitae.net",84),
("Quam Quis Diam Industries","2018-01-26 04:20:58",46,"http://www.google.es","https://pausabe.com/apps/CBCN/images/prova8.jpg","https://pausabe.com/apps/CBCN/images/provaLQ8.jpg","conubia@aliquameu.ca",15),
("Magna Associates","2018-09-03 18:25:37",30,"http://www.google.es","https://pausabe.com/apps/CBCN/images/prova1.jpg","https://pausabe.com/apps/CBCN/images/provaLQ1.jpg","elit.elit.fermentum@cubilia.org",18),
("Gravida Nunc Sed Corp.","2018-11-02 11:31:43",69,"http://www.google.es","https://pausabe.com/apps/CBCN/images/prova2.jpg","https://pausabe.com/apps/CBCN/images/provaLQ2.jpg","euismod.in@utpharetra.net",51);

COMMIT;