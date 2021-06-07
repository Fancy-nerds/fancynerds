if (!GutterContext) var GutterContext = wp.element.createContext(null);
if (!EnableGutterContext) var EnableGutterContext = wp.element.createContext(null);

console.log('red')

class SizerBlock {
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
    this.blocks.registerBlockType("fancy-blocks/container", {
      title: "Container",
      icon: "media-default",
      category: "fancy-containers",
      attributes: {
        size: {
          type: "integer",
          default: 0,
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
            this.el(wp.components.RangeControl, {
              label: "Container size(in px)",
              value: props.attributes.size,
              min: 0,
              max: 1800,
              onChange: (size) => {
                props.setAttributes({ size });
              },
            })
          )
        )
      ),
      this.el(
        "div",
        {
          style: {
            border: '#adb2ad solid 1px',
            padding: '15px'
          },
        },
        this.el(this.InnerBlocks)
      )
    ];
  }

  save(props) {
    return this.el(
      "div",
      {
        className: "float-container",
        style: {
          maxWidth: props.attributes.size ? `${props.attributes.size}px` : '100%',
        },
      },
      this.el(this.InnerBlocks.Content)
    );
  }
}
window.heroRowBlock = new SizerBlock(
  window.wp.blocks,
  window.wp.element,
  window.wp.blockEditor
);
