(function (blocks, element, components, blockEditor) {
  const el = element.createElement;
  const useBlockProps = blockEditor.useBlockProps;
  const InnerBlocks = blockEditor.InnerBlocks;

  blocks.registerBlockType("fancy-blocks/container", {
    apiVersion: 2,
    title: "Container",
    icon: "media-default",
    category: "fancy-containers",
    attributes: {
      maxWidth: {
        type: "integer",
        default: undefined,
      },
    },
    edit({ attributes, setAttributes }) {
      const blockProps = useBlockProps({
        style: {
          border: "#adb2ad solid 1px",
          padding: "15px",
        },
      });
      const { maxWidth } = attributes;

      return [
        el(
          blockEditor.InspectorControls,
          {},
          el(
            components.Card,
            null,
            el(
              components.CardBody,
              null,
              el(components.RangeControl, {
                label: "Max. width",
                help: "size in px",
                value: maxWidth,
                allowReset: true,
                min: 320,
                max: 1800,
                onChange(maxWidth) {
                  setAttributes({ maxWidth });
                },
              })
            )
          )
        ),
        el(
          "div",
          blockProps,
          el(
            "div",
            null,
            el(
              "div",
              {
                className: "container",
                style: {
                  maxWidth,
                },
              },
              el(InnerBlocks)
            )
          )
        ),
      ];
    },
    save({ attributes }) {
      const blockProps = useBlockProps.save({
        className: "section section--container_block",
      });
      const { maxWidth } = attributes;
      return el(
        "section",
        blockProps,
        el(
          "div",
          {
            className: "container",
            style: {
              maxWidth,
            },
          },
          el(InnerBlocks.Content)
        )
      );
    },
  });
})(wp.blocks, wp.element, wp.components, wp.blockEditor);
