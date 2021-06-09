(function (blocks, element, components, blockEditor, i18n, data) {
  const el = element.createElement;
  const useBlockProps = blockEditor.useBlockProps;
  const InnerBlocks = blockEditor.InnerBlocks;
  const __ = i18n._n;
  const withColors = blockEditor.withColors;
  const { useSelect } = data;

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
      bgColor: {
        type: "string",
      },
    },
    edit: withColors("bgColor")(
      ({ attributes, setAttributes, bgColor, setBgColor }) => {
        const colors = useSelect((select) => {
          return select("core/block-editor")
            .getSettings()
            .colors.filter(
              (colorObj) => !["black", "transparent"].includes(colorObj.slug)
            );
        }, []);

        const colorClassName = blockEditor.getColorClassName(
          "background-color",
          bgColor.slug
        );
        const { maxWidth } = attributes;
        const blockProps = useBlockProps({
          className: `section section--container_block${
            colorClassName ? " has-background " + colorClassName : ""
          }`,
          style: {
            border: "#adb2ad solid 1px",
            padding: "15px",
            backgroundColor: bgColor.color,
          },
        });

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
            ),
            el(blockEditor.PanelColorSettings, {
              title: __("Color settings"),
              disableCustomColors: true,
              colorSettings: [
                {
                  colors,
                  value: bgColor.color,
                  onChange: setBgColor,
                  label: __("Background color"),
                },
              ],
            })
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
      }
    ),
    save({ attributes }) {
      const { maxWidth, bgColor } = attributes;
      const colorClassName = blockEditor.getColorClassName(
        "background-color",
        bgColor
      );
      const blockProps = useBlockProps.save({
        className: `section section--container_block${
          colorClassName ? " has-background " + colorClassName : ""
        }`,
      });

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
})(wp.blocks, wp.element, wp.components, wp.blockEditor, wp.i18n, wp.data);
