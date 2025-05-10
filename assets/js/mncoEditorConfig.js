function decodeHtmlEntities(text) {
  var txt = document.createElement("textarea");
  txt.innerHTML = text;
  return txt.value;
}

// Déclarer les éditeurs en dehors pour qu'ils soient accessibles partout
let editorHTML, editorCSS, editorJS;

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

  publi_html = decodeHtmlEntities(publi_html);
  publi_css = decodeHtmlEntities(publi_css);
  publi_js = decodeHtmlEntities(publi_js);

  editorHTML = monaco.editor.create(document.getElementById("editor-html"), {
    value: publi_html,
    language: "html",
    theme: "vs-dark",
  });

  editorCSS = monaco.editor.create(document.getElementById("editor-css"), {
    value: publi_css,
    language: "css",
    theme: "vs-dark",
  });

  editorJS = monaco.editor.create(document.getElementById("editor-js"), {
    value: publi_js,
    language: "javascript",
    theme: "vs-dark",
  });
});

// Expansion de l'éditeur
const iconExp = document.querySelectorAll(".exp");
const editorExpand = document.querySelectorAll(".mastercode_container");

iconExp.forEach((btnExp, index) => {
  let editorExpandEl = editorExpand[index];
  btnExp.addEventListener("click", () => {
    editorExpandEl.classList.toggle("expansionEditor");

    setTimeout(() => {
      if (index === 0 && editorHTML) editorHTML.layout();
      if (index === 1 && editorCSS) editorCSS.layout();
      if (index === 2 && editorJS) editorJS.layout();
    }, 300);
  });
});
