# Plugin Einbinden

Um unsere FrameServices bzw. Web Plugins zu verwenden, müssen Sie sich zuerst einen Web key auf unserem Kundenportal erstellen.<br>
Fügen Sie diesem dann die Domains hinzu, wo Sie die Web Plugins verwenden wollen. (Subdomains werden automatisch pro eingetragene Domain freigegeben)<br>
Jetzt können Sie folgende iFrames nutzen (Einfach kopieren, einfügen, WebKey ändern und gut. Gerne auch modifizieren, damit es optimal für Ihre Webseite passt):<br><br>
```html
<iframe 
    src="https://plugin.greenbucket.online/?plugin=PLUGIN&webkey=WEBKEY" 
    style="display:block;border:none;height:85vh;width:100%;" 
    frameborder="0"
></iframe>
```
<br><br>
Ersetzen Sie PLUGIN mit dem Plugin, welches Sie verwenden möchten.<br>
Ersetzen Sie WEBKEY mit Ihrem generierten Web key.<br>
Optional können Sie beim Gästebuch ```&theme=dark``` angeben, um das Gästebuch im Dunklem Modus auf zu rufen.<br>
<br><br>

# Web Keys

Ihr Free Limit beträgt bis zu 3 Web Keys und pro Web Key bis zu 5 Domains. `localhost` wird hierbei NICHT mit gezählt.<br>
Wir empfehlen, `localhost` nur für Development zu verwenden und zu entfernen, wenn Sie den Web Key produktiv verwenden!
<br><br>
Mit jedem Web Key den Sie generieren, haben Sie zugriff auf ALLE Plugins. Sie haben insgesammt 2MB Speicherplatz zur Verfügung.<br>
Haben Sie mehrere Web Keys, teilen Sich die 2MB auf diese frei auf (es sind also NICHT 2MB pro Web Key!)

<br><br>

# Kundenportal

Melden Sie sich beim Kundenportal mit Ihrem greenbucket&reg; Benutzer Account an (oder registrieren Sie sich)<br>
Kundenportal: <a href="https://portal.greenbucket.online">portal.greenbucket.online</a>

<br><br>

# Web Plugins

## PLUGIN: Gästebuch

`?plugin=gastbuch`<br><br>
Mit unserem Gästebuch Plugin können Sie ganz einfach und bequem ein Gästebuch auf Ihrer Webseite einbinden. Dort können Sich Besucher<br>
Ihrer webseite zu Ihnen und Ihren großartigen Diensten äußern. Das Gästebuch unterstützt auch Emojis und ist abgesichert mit dem offiziellen reCAPTCHA.<br><br>

## PLUGIN: Terminkalender

`?plugin=kalender`<br><br>

Auch einen Terminkalender wo Sie Ihre eigenen Veranstaltungen eintragen können ist so einfach ein zu binden wie unser Gästebuch.<br>
Halten Sie Ihre Webseiten Besucher über Termine auf dem laufenden.<br><br>

## PLUGIN: Admin Panel

`?plugin=admin`<br><br>

Verwalten Sie die Termine im Terminkalender und die Einstellungen des Gästebuchs ebenfalls auf Ihrer Seite mit unserem Admin Plugin.<br>
Sie müssen nicht extra auf eine unserer Seiten kommen um sparat alle Daten ein zu tragen. Statdessen binden Sie einfach das Admin Plugin ein<br>
und melden Sich dort mit Ihrem greenbucket&reg; Account an. Tragen Sie dort Termine ein und moderieren Sie Ihr Gästebuch.

<br><br>

# Kontakt

Gibt es Probleme oder haben Sie Fragen? Kein Problem! Kontaktieren Sie uns unter <a href="https://greenbucket.online/kontakt">greenbucket.online/kontakt</a><br>
