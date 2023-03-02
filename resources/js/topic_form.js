import { createEditor, createToolbar } from "@wangeditor/editor";

const editorConfig = {
  placeholder: "请填入至少三个字符的内容",
  onChange: (editor) => {
    const html = editor.getHtml();
    document.getElementById("editor").value = html;
  },
};

const editor = createEditor({
  selector: "#editor-container",
  config: editorConfig,
  mode: "default",
});

const toolbarConfig = {};
const toolbar = createToolbar({
  editor,
  selector: "#toolbar-container",
  config: toolbarConfig,
  mode: "default",
});
