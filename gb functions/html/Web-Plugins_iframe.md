# Plugin Einbinden

Um unsere FrameServices bzw. Web Plugins zu verwenden, müssen Sie sich zuerst einen Web key auf unserem Kundenportal erstellen.<br>
Fügen Sie diesem dann die Domains hinzu, wo Sie die Web Plugins verwenden wollen. (Subdomains werden automatisch pro eingetragene Domain freigegeben)<br>
Jetzt können Sie folgende iFrames nutzen (Einfach kopieren, einfügen, WebKey ändern und gut. Gerne auch modifizieren, damit es optimal für Ihre Webseite passt):<br><br>
```html
<iframe 
    src="https://plugin.greenbucket.online/?plugin=[PLUGIN]&webkey=[WEBKEY]" 
    style="display:block;border:none;height:85vh;width:100%;" 
    frameborder="0"
></iframe>
```
<br><br>
Ersetzen Sie [PLUGIN] mit dem Plugin, welches Sie verwenden möchten.<br>
Ersetzen Sie [WEBKEY] mit Ihrem generierten Web key.<br>
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
