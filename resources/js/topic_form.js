import { createEditor, createToolbar } from "@wangeditor/editor";

const editorConfig = {
  placeholder: "请填入至少三个字符的内容",
  onChange: (editor) => {
    const html = editor.getHtml();
    document.getElementById("editor").value = html;
  },
  MENU_CONF: {},
};

editorConfig.MENU_CONF["uploadImage"] = {
  server: "/upload_image",
  headers: {
    "X-CSRF-TOKEN": document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
  },
};

const editor = createEditor({
  selector: "#editor-container",
  config: editorConfig,
  mode: "default",
});

if (document.getElementById("editor").value) {
  editor.setHtml(document.getElementById("editor").value);
}

const toolbarConfig = {};
const toolbar = createToolbar({
  editor,
  selector: "#toolbar-container",
  config: toolbarConfig,
  mode: "default",
});
