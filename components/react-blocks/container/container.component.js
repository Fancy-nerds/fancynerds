(function (blocks, element, components, blockEditor, i18n, data, compose) {
  const { createElement: el, useEffect, useMemo } = element;
  const useBlockProps = blockEditor.useBlockProps;
  const InnerBlocks = blockEditor.InnerBlocks;
  const __ = i18n._n;
  const withColors = blockEditor.withColors;
  const { useSelect } = data;

  function ContainerEdit({
    clientId,
    attributes,
    setAttributes,
    bgColor,
    setBgColor,
    isSelected,
  }) {
    const colors = useSelect((select) => {
      return select("core/block-editor")
        .getSettings()
        .colors.filter(
          (colorObj) => !["black", "transparent"].includes(colorObj.slug)
        );
    }, []);

    useEffect(() => {
      setAttributes({ id: clientId });
    }, []);

    const colorClassName = blockEditor.getColorClassName(
      "background-color",
      bgColor.slug
    );
    const { maxWidth, padding, fluid } = attributes;
    const blockProps = useBlockProps({
      className: `section container-block${
        colorClassName ? " has-background " + colorClassName : ""
      }`,
      style: {
        border: isSelected ? "1px solid #494949" : "1px solid #a6a6a6",
        backgroundColor: bgColor.color,
      },
    });

    return [
      el(
        blockEditor.InspectorControls,
        {},
        el(
          components.Panel,
          null,
          el(
            components.PanelBody,
            {
              title: "Container width",
              initialOpen: false,
            },
            el(components.CheckboxControl, {
              label: "Fluid container",
              checked: fluid,
              onChange(checked) {
                setAttributes({ fluid: checked });
              },
            }),
            el(components.RangeControl, {
              label: "Max. width",
              help: "size in px",
              disabled: fluid,
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
        el(
          components.Panel,
          null,
          el(
            components.PanelBody,
            {
              title: "Paddings",
              initialOpen: false,
            },
            Object.keys(padding).map((key, ind, arr) =>
              el(
                element.Fragment,
                {
                  key,
                },
                el(
                  "h3",
                  {
                    style: {
                      fontWeight: 500,
                    },
                  },
                  key === "sm"
                    ? "Small screen"
                    : key === "md"
                    ? "Medium screen"
                    : key === "default"
                    ? "Large size"
                    : ""
                ),
                el(components.RangeControl, {
                  label: "Padding Top",
                  value: padding[key].top,
                  allowReset: true,
                  min: 0,
                  max: 130,
                  onChange(val) {
                    setAttributes({
                      padding: {
                        ...padding,
                        [key]: {
                          ...padding[key],
                          top: val,
                        },
                      },
                    });
                  },
                }),
                el(components.RangeControl, {
                  label: "Padding Bottom",
                  value: padding[key].bottom,
                  allowReset: true,
                  min: 0,
                  max: 130,
                  onChange(val) {
                    setAttributes({
                      padding: {
                        ...padding,
                        [key]: {
                          ...padding[key],
                          bottom: val,
                        },
                      },
                    });
                  },
                }),
                el(
                  "p",
                  null,
                  key === "sm"
                    ? "Screnn size < 768px - small tablet & mobile."
                    : key === "md"
                    ? "Screnn size < 992px - tablet."
                    : key === "default"
                    ? "Screnn size ≥ 992 - ipad pro, notebook, desktop."
                    : ""
                ),
                ind < arr.length - 1 && el(components.CardDivider)
              )
            )
          )
        ),
        el(blockEditor.PanelColorSettings, {
          title: __("Color settings", "fancynerds"),
          disableCustomColors: true,
          colorSettings: [
            {
              colors,
              value: bgColor.color,
              onChange: setBgColor,
              label: __("Background color", "fancynerds"),
            },
          ],
        })
      ),
      el(CustomStyle, {
        blockId: "block-" + clientId,
        padding,
      }),
      el(
        "div",
        blockProps,
        el(
          "div",
          {
            className: `container${fluid ? " container--fluid" : ""}`,
            style: {
              maxWidth: fluid ? undefined : maxWidth,
            },
          },
          el(InnerBlocks)
        )
      ),
    ];
  }
  const WrappedContainerEdit = withColors("bgColor")(ContainerEdit);

  function ContainerSave({ attributes }) {
    const { maxWidth, bgColor, padding, id, fluid } = attributes;
    const colorClassName = blockEditor.getColorClassName(
      "background-color",
      bgColor
    );
    const blockProps = useBlockProps.save({
      id: "block-" + id,
      className: `section container-block${
        colorClassName ? " has-background " + colorClassName : ""
      }`,
    });

    return el(
      element.Fragment,
      null,
      el(CustomStyle, {
        blockId: "block-" + id,
        padding,
      }),
      el(
        "section",
        blockProps,
        el(
          "div",
          {
            className: `container${fluid ? " container--fluid" : ""}`,
            style: {
              maxWidth: fluid ? undefined : maxWidth,
            },
          },
          el(InnerBlocks.Content)
        )
      )
    );
  }

  const WrapperContainerSave = ContainerSave;

  function CustomStyle({ padding, blockId }) {
    const innerStyle = Object.keys(padding).reduce(
      (acc, key) =>
        acc +
        Object.keys(padding[key]).reduce(
          (pAcc, pKey) =>
            pAcc +
            (typeof padding[key][pKey] !== "undefined"
              ? `--container-block-padding-${pKey}-${key}: ${padding[key][pKey]}px;\n`
              : ""),
          ""
        ),
      ""
    );

    return innerStyle
      ? el("style", null, `#${blockId} {\n${innerStyle}}`)
      : null;
  }

  blocks.registerBlockType("fancy-blocks/container", {
    apiVersion: 2,
    title: "Container",
    description:
      "This block allows you to create a container of any width and with any paddings.",
    icon: "media-default",
    category: "fancy-containers",
    attributes: {
      maxWidth: {
        type: "integer",
        default: undefined,
      },
      fluid: {
        type: "boolean",
        default: false,
      },
      bgColor: {
        type: "string",
      },
      id: {
        type: "string",
      },
      padding: {
        type: "object",
        default: {
          default: {
            bottom: undefined,
            top: undefined,
          },
          md: {
            bottom: undefined,
            top: undefined,
          },
          sm: {
            bottom: undefined,
            top: undefined,
          },
        },
      },
    },
    edit: WrappedContainerEdit,
    save: WrapperContainerSave,
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