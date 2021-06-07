if (!GutterContext) var GutterContext = wp.element.createContext(null);
if (!EnableGutterContext)
  var EnableGutterContext = wp.element.createContext(null);

class TextBlock {
  constructor(blocks, element, blockEditor) {
    this.el = element.createElement;
    this.blocks = blocks;
    this.InnerBlocks = blockEditor.InnerBlocks;
    this.init();
  }

  init() {
    this.register();
  }

  register() {
    this.blocks.registerBlockType("sga-blocks/text-box", {
      title: "SGA Text Box",
      icon: "format-aside",
      category: "sga-blocks",
      attributes: {
        paddingSize: {
          type: "object",
          default: BOX_SIZES[3],
        },
        viewType: {
            type: "string",
            default: "",
          },
      },
      edit: (props) => this.edit(props),
      save: (props) => this.save(props),
    });
  }

  edit(props) {
    return [
      this.el(
        wp.blockEditor.InspectorControls,
        {},
        this.el(
          wp.components.Card,
          null,
          this.el(
            wp.components.CardBody,
            null,
            sizeControl(props, "paddingSize")
          ),
          this.el(
            wp.components.CardBody,
            null,
            this.el(wp.components.SelectControl, {
              label: "Select view type",
              help: "Select the type of content that you will use in this block. This will affect the size of the indents.",
              value: props.attributes.viewType,
              options: [
                { label: "Mixed", value: "" },
                { label: "List", value: "block-list" },
                { label: "Head", value: "block-text--apad" },
              ],
              onChange: (viewType) => {
                props.setAttributes({ viewType });
              },
            })
          )
        )
      ),
      this.el(
        "div",
        {
          style: {
            border: "#adb2ad solid 1px",
            padding: `0 ${props.attributes.paddingSize.adminPad}px`,
          },
        },
        this.el(this.InnerBlocks)
      ),
    ];
  }

  save(props) {
    return this.el(
      "section",
      {
        className: `block block-text ${props.attributes.viewType}`,
      },
      this.el(
        "div",
        {
          className: `block__container ${
            props.attributes.paddingSize.value
              ? `block__container--${props.attributes.paddingSize.value}`
              : ""
          }`,
        },
        this.el(
          "div",
          {
            className: "block__inner",
          },
          this.el(this.InnerBlocks.Content)
        )
      )
    );
  }
}
window.heroRowBlock = new TextBlock(
  window.wp.blocks,
  window.wp.element,
  window.wp.blockEditor
);
