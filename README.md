## Configurable shopping list (WEB version)
- The application allows you to create shopping lists in which you can add products according to a predetermined category order for the store.
- Additionally, it is possible to define custom products, so that they will always be available at hand when creating new lists.
- In addition to the basic functionality, it is also possible to share your lists or custom products between users.
- [Mobile app](https://github.com/marcin98b/configurable_list_native)
<img src="https://github.com/marcin98b/configurable_list/assets/65306120/0e27751b-ace0-412e-bdbe-b2ae095bdb17)" width="500" height="400">

## Installation
1. Clone repo
```
git clone https://github.com/marcin98b/configurable_list.git configurable_list
cd configurable_list
```
2. Install Laravel app using Composer
```
composer install
```
3. Create .env file and fill variables (DB connection etc.) using editor
```
cp .env.example .env
nano .env
```
4. Generate application key
```
php artisan key:generate
```
5. Install frontend packages using npm
```
npm install
```
6. Setup storage link for file uploads
```
php artisan storage:link
sudo chmod o+w ./storage/ -R
```
8. Run migrations, create dev build using npm and run.
```
php artisan migrate:fresh
npm run dev
php artisan serve
```

## RESTful API Endpoints
<table class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" width="662" style="width:496.85pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt">
 <tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:31.2pt">
  <td width="80" style="width:59.7pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Nagwektabeli">Function</p>
  </td>
  <td width="55" style="width:41.35pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Nagwektabeli">HTTP Method</p>
  </td>
  <td width="299" style="width:224.45pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Nagwektabeli">URL Resource</p>
  </td>
  <td width="228" style="width:171.35pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Nagwektabeli">Description</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:1;height:31.2pt">
  <td width="80" rowspan="3" valign="top" style="width:59.7pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Authorization (guest)</p>
  </td>
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/register</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">User registration.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:2;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/login</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">User login.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:3;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/<span class="SpellE">logout</span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">User logout.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:4;height:31.2pt">
  <td width="80" rowspan="8" valign="top" style="width:59.7pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Lists management</p>
  </td>
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/lists</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Getting all user lists.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:5;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/lists/<span class="SpellE">create</span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Create a new list with a given name.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:6;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/lists/{id}/<span class="SpellE">duplicate</span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Duplication of list of given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:7;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/lists/{id}</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Downloading a single list with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:8;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">PUT</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/lists/{id}</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Edit the data fields of the list with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:9;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">DEL</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/lists/{id}</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Delete the list with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:10;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/lists/shared/{share_key}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Downloading a shared list by another user, having the identifier {share_key}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:11;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/lists/shared/{share_key}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Adding a new list based on a list shared by another user, having the identifier {share_key}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:12;height:31.2pt">
  <td width="80" rowspan="6" valign="top" style="width:59.7pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Shops management</p>
  </td>
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/shops</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Getting all user stores.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:13;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/shops/<span class="SpellE">create</span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Create a new store with a given name.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:14;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/shops/{id}</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Getting a store with a given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:15;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/shops/{id}/lists<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Getting lists assigned to a store with a given
  {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:16;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">PUT</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/shops/{id}</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Edit the data fields of a store with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:17;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">DEL</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/shops/{id}</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Deleting a store with a given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:18;height:31.2pt">
  <td width="80" rowspan="5" valign="top" style="width:59.7pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Shops category management</p>
  </td>
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/shops/{id}/categories<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Getting the categories of the store with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:19;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/shops/{id}/categories/create<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Creation of a new category, assigned to a store
  with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:20;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">PUT</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/shops/{id}/categories/{<span class="SpellE">category_id</span>}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Edit the data fields of a category with data {<span class="SpellE">category_id</span>}, assigned to a store with data {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:21;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">DEL</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/shops/{id}/categories/{<span class="SpellE">category_id</span>}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Delete a category with given {<span class="SpellE">category_id</span>},
  assigned to a store with given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:22;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/shops/{id}/categories/<span class="SpellE">updatePosition</span>/{<span class="SpellE">arr</span>}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Edit the order of categories in a store with a given {<span class="SpellE">shop_id</span>} based on the order of {<span class="SpellE">arr</span>}
  (a sequence of consecutive category id separated by a comma).</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:23;height:31.2pt">
  <td width="80" rowspan="4" valign="top" style="width:59.7pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Products management (in lists)</p>
  </td>
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/lists/{id}/products</p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Download all products created in the list
  with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:24;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/lists/{id}/<span class="SpellE">addproduct</span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Create a new product in the list with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:25;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">PUT</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/lists/{id}/products/{<span class="SpellE">product_id</span>}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Edit the data fields of a product with data {<span class="SpellE">product_id</span>}, assigned to a list with data {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:26;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">DEL</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/lists/{id}/products/{<span class="SpellE">product_id</span>}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Removal of a product with given {<span class="SpellE">product_id</span>}.
  in the list with given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:27;height:31.2pt">
  <td width="80" rowspan="8" valign="top" style="width:59.7pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Custom products management.</p>
  </td>
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/<span class="SpellE">customProducts</span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Download all custom products of user.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:28;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">/<span class="SpellE">api</span>/<span class="SpellE">customProducts</span>/<span class="SpellE">create</span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Creation of a new custom product.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:29;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/<span class="SpellE">customProducts</span>/{id}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Getting a custom product with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:30;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">DEL</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/<span class="SpellE">customProducts</span>/{id}</span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Delete a custom product with the given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:31;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">PUT</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/<span class="SpellE">customProducts</span>/{id}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Edit the data fields of a custom product with
  given {id}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:32;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/<span class="SpellE">customProducts</span>/{id}/upload<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Uploading a custom product image with
  given {id} to the server.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:33;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">GET</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/<span class="SpellE">customProducts</span>/shared/{<span class="SpellE">custom_share_key</span>}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Getting a custom product provided by another user, having the identifier {<span class="SpellE">custom_share_key</span>}.</p>
  </td>
 </tr>
 <tr style="mso-yfti-irow:34;mso-yfti-lastrow:yes;height:31.2pt">
  <td width="55" style="width:41.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">POST</p>
  </td>
  <td width="299" style="width:224.45pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli"><span lang="EN-US" style="mso-ansi-language:EN-US">/<span class="SpellE">api</span>/<span class="SpellE">customProducts</span>/shared/{<span class="SpellE">custom_share_key</span>}<o:p></o:p></span></p>
  </td>
  <td width="228" style="width:171.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:31.2pt">
  <p class="Danatekstowatabeli">Adding a new custom product shared by another user, having the identifier {<span class="SpellE">custom_share_key</span>}.</p>
  </td>
 </tr>
</tbody></table>

Detailed description of endpoint structure: https://documenter.getpostman.com/view/15594587/Tzeah5JW

## Screenshots 

<h4>Authorization</h4>

![image](https://github.com/marcin98b/configurable_list/assets/65306120/70e26ae3-3b19-4aff-bfc9-5f99061f17d1)

<h4>Shopping lists view</h4>

![image](https://github.com/marcin98b/configurable_list/assets/65306120/94af9b9c-ec58-46a7-af67-e29677a4b71b)

<h4>Products in shopping list</h4>

![image](https://github.com/marcin98b/configurable_list/assets/65306120/34351dbb-2e71-43f3-8731-cf5f4b46a8b3)

<h4>Stores view</h4>

![image](https://github.com/marcin98b/configurable_list/assets/65306120/4263fba9-e792-40a7-9168-0812473fcffe)

<h4>Store category ordering (drag&drop)</h4>

![image](https://github.com/marcin98b/configurable_list/assets/65306120/3c2c4cb5-5b98-4022-8c5b-3db3fdc388f4)

<h4>Custom products for lists</h4>

![image](https://github.com/marcin98b/configurable_list/assets/65306120/d1048b7c-4827-4b79-838d-786d0036476c)


