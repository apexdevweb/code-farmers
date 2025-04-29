function decodeHtmlEntities(text) {
  var txt = document.createElement("textarea");
  txt.innerHTML = text;
  return txt.value;
}

require.config({
  paths: { vs: "https://cdn.jsdelivr.net/npm/monaco-editor@0.33.0/min/vs" },
});

require(["vs/editor/editor.main"], function () {
  var publi_html = JSON.parse(
    document.getElementById("html-content").textContent
  );
  var publi_css = JSON.parse(
    document.getElementById("css-content").textContent
  );
  var publi_js = JSON.parse(document.getElementById("js-content").textContent);

  // Décoder les entités HTML ici
  publi_html = decodeHtmlEntities(publi_html);
  publi_css = decodeHtmlEntities(publi_css);
  publi_js = decodeHtmlEntities(publi_js);

  var editorHTML = monaco.editor.create(
    document.getElementById("editor-html"),
    {
      value: publi_html,
      language: "html",
      theme: "vs-dark",
    }
  );

  var editorCSS = monaco.editor.create(document.getElementById("editor-css"), {
    value: publi_css,
    language: "css",
    theme: "vs-dark",
  });

  var editorJS = monaco.editor.create(document.getElementById("editor-js"), {
    value: publi_js,
    language: "javascript",
    theme: "vs-dark",
  });
});
