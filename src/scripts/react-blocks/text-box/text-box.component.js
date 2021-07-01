(function (blocks, element, components, blockEditor, i18n, data, compose) {
  const { createElement: el } = element;
  const useBlockProps = blockEditor.useBlockProps;
  const InnerBlocks = blockEditor.InnerBlocks;

  function TextBoxEdit({ isSelected }) {
    const blockProps = useBlockProps({
      className: "text-box",
      style: {
        border: isSelected ? "1px dashed #494949" : "1px dashed #a6a6a6",
        padding: "30px",
        margin: 0,
      },
    });
    return el("div", blockProps, el(InnerBlocks));
  }

  function TextBoxSave() {
    const blockProps = useBlockProps.save({
      className: "text-box",
    });

    return el("div", blockProps, el(InnerBlocks.Content));
  }

  blocks.registerBlockType("fancy-blocks/text-box", {
    apiVersion: 2,
    title: "Text Box",
    description: "This block contains styles for text elements such as p, h1-h6, code, link and etc. You can use it to display post content.",
    icon: "media-document",
    category: "fancy-containers",
    edit: TextBoxEdit,
    save: TextBoxSave,
  });
})(
  wp.blocks,
  wp.element,
  wp.components,
  wp.blockEditor,
  wp.i18n,
  wp.data,
  wp.compose
);
