function refreshpub() {
  const cdepub_html = document.getElementById("editor-html").value;
  const cdepub_css =
    "<style>" + document.getElementById("editor-css").value + "</style>";
  const cdepub_js =
    "<scri" +
    "pt>" +
    document.getElementById("editor-js").value +
    "</scri" +
    "pt>";
  const page = document.getElementById("res2").contentWindow.document;
  page.open();
  page.write(cdepub_html + cdepub_css + cdepub_js);
  page.close();
}
