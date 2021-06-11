(function (blocks, element, components, blockEditor, i18n, data, compose) {
  const { createElement: el } = element;
  const useBlockProps = blockEditor.useBlockProps;
  const InnerBlocks = blockEditor.InnerBlocks;

  function TextBoxEdit() {
    const blockProps = useBlockProps({
      className: "text-box",
      style: {
        border: "1px dashed #494949",
        padding: '0 15px',
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
