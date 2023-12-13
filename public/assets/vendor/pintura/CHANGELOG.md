# Changelog

## 8.69.0 | 2023-11-27

-   Add outline and textShadow support to text shapes.
-   Add `stickerForceEnable`, set to `true` to show the Stickers util even when the `stickers` prop is not set.
-   Fix issue with `enableTapToAddText` where tapping outside an active text field would immediately create a new text field instead of confirming text in the currently active text field.

## 8.68.3 | 2023-11-26

-   Fix issue with feather error when drawing image shape.

## 8.68.2 | 2023-11-21

-   Fix issue where undo and redo would not work for sharpie lines.

## 8.68.1 | 2023-11-20

-   Fix issue where Crop util footer would still be rendered even when both the rotation and scale control were disabled.
-   Fix issue where `imageTrim` wasn't set automatically when `imageMaxDuration` was defined.

## 8.68.0 | 2023-11-16

-   Add `foregroundColor`, `targetSize`, and `forceSquareCanvas` to `selectionToMask` options.
-   Add `foregroundColor`, `targetSize`, `maskFormat`, `shapeFormat`, and `mimeType` to `createRetouchShape` options.
-   Add correctly transformed `shape` to `selectionToMask` result object.
-   Fix issue where mask wasn't correctly aligned when image was flipped or rotated.
-   Fix issue where rectangular masks were rotated incorrectly.
-   Fix issue where padding was incorrectly applied to the mask rectangle instead of the mask canvas.
-   Fix stretched inpaint results when mask wasn't square, can now force square mask with `forceSquareCanvas`.
-   Fix bug where Chrome 119 wouldn't correctly composite canvas operations.

## 8.67.4 | 2023-11-06

-   Fix issue with path tool not drawing more than one anchor point inside other shape.
-   Fix `selectionToMask` return type in TypeScript declarations.

## 8.67.3 | 2023-11-02

-   Fix TypeScript declarations missing Retouch plugin options.

## 8.67.2 | 2023-10-26

-   Fix issue where retouch selections were very slow when used on large images.
-   Improve memory management for video sources.

## 8.67.1 | 2023-10-19

-   Fix issue where button icon for custom panel component could not be set.

## 8.67.0 | 2023-10-19

-   Add detection of `data-touch-scroll` attribute on custom child elements, set to `true` to enable touch scrolling on iOS.

## 8.66.3 | 2023-10-09

-   Fix issue where `minDuration` and `maxDuration` weren't part of imageState.

## 8.66.2 | 2023-10-05

-   Fix issue with shortcut options no longer working when passed to `createMarkupEditorShapeStyleControls`

## 8.66.1 | 2023-10-03

-   Fix issue where deprecated `stickerEnableSelectImage` prop would not enable sticker util.
-   Fix types.

## 8.66.0 | 2023-09-27

This release adds support for pixel manipulation using the retouch plugin, for an example implementation of the new features see: https://github.com/pqina/pintura-example-feature-retouch

-   Add `textDirection` property, set to `'rtl'` to enable right-to-left text direction.
-   Add `retouch` plugin, this plugin just like `sticker` is a plugin that is empty by default.
-   Add `getShapeById` helper function to quickly find a shape by id in a collection of shapes.
-   Add `updateShapeById` helper function to quickly update a shape in a collection by id.
-   Add `selectionToMask` helper function to create a canvas or blob masked when passed a selection array.
-   Add `createRetouchShape` helper function to make it easier to create retouch shapes.
-   Add `createMarkupEditorBrushSizeControl` helper function to create a brush size control.
-   Add `createMarkupEditorSelectionModeControl` helper function to create a selection mode controls showing new, add, subtract selection modes.
-   Add `createMarkupEditorSelectionToolStyles` helper function to create brush, lassoo, rectangle, and ellipse selection tool styles.
-   Add `createMarkupEditorSelectionTools` helper function to create brush, lassoo, rectangle, and ellipse tool buttons.
-   Add `bitmap` prop to shape, set to `true` to render shape with canvas, currently only works for path based shapes.
-   Add `letterSpacing` prop to shape.
-   Add shape `status` property, set to `'loading'`, or `'error'` to show loading indicator or error state.
-   Add support for `strokeDash`, `strokeCap`, and `strokeJoin` to `bitmap` based path shapes.
-   Add `showTextInput` and `hideTextInput` editor methods to toggle quick text input.
-   Add `imageSelection` array to read out or write to current selection shapes.
-   Add `imageManipulation` array to render shapes in image layer.
-   Add `cursorStyle: 'ellipse'` to sharpie and eraser shapes.
-   Add `strokeJoin: 'round'`, and `strokeCap: 'round'` to sharpie.
-   Add `cursorSize` property to shape, takes a fixed size or a shape property reference to read cursor size from.
-   Add support for tool groups in the util toolbar.
-   Add `'blurshape'`, `'selectiondown'`, `'selectionup'`, and `'selectionchange'`, events.
-   Add `feather` property to lower opacity towards edges of rectangle shapes.
-   Add `selectionStyle` property to shape, set to `'hook'` to only render selection corners when a shape is selected.

And a long list of other small fixes and improvements.

## 8.65.0 | 2023-09-13

-   Add `resizeAspectRatioLocked` to set initial lock stated in resize util.
-   Add `resizeEnableButtonLockAspectRatio` to enable or disable the lock button.
-   Fix issue where backspace would not remove a newly added sticker.

## 8.64.6 | 2023-09-12

-   Fix issue where Firefox would not correclty parse video orientation.

## 8.64.5 | 2023-09-07

-   Fix `fontFamilyOptions` property not being read correctly.

## 8.64.4 | 2023-09-07

-   Fix regression where `enableInput` no longer worked with font size control.

## 8.64.3 | 2023-09-05

-   Fix issue where style control components couldn't be customized on React Native.

## 8.64.2 | 2023-09-05

-   Fix issue where style control options couldn't be customized on React Native.

## 8.64.1 | 2023-08-21

-   Fix types for new options added to markup editor controls.

## 8.64.0 | 2023-08-18

-   Add `enableInput` option to font size and line height controls. Currently only works when sizes are absolute.

## 8.63.1 | 2023-08-18

-   Fix issue where Hex color input couldn't be enabled on `strokeColor` and `color` styles.
-   Fix issue where Hex input could still input opacity if opacity input was disabled.
-   Fix issue where opaque Hex colors would be defined with 8 characters instead of 6.

## 8.63.0 | 2023-08-16

-   Add Hex color input to color picker control, this input is disabled by default, enable by passing `enableInput` to `backgroundColor` style control options.
-   `createMarkupEditorShapeStyleControls` now also accepts style properties.

Media controls have been moved to core so media can be controlled from main editor. This functionality only works when video extension is loaded.

-   Add `"play"` and `"pause"` events.
-   Add `play()`, starts playing a video.
-   Add `pause()`, pauses a playing video.
-   Add `togglePlayPause()`, toggle between play and pause mode.
-   Add `isPaused()`, returns `true' if the video is paused.
-   Add `mute()`, mutes audio.
-   Add `unmute()`, restores audio.
-   Add `toggleMute()`, toggles mute state.
-   Add `getDuration()`, returns the video duration in seconds.
-   Add `getCurrentTime()`, returns the current position in seconds.
-   Add `setCurrentTime(seconds)`, sets the current position in seconds.

## 8.62.0 | 2023-08-07

-   Add `imageMinDuration` to limit the duration and clip lengths of loaded videos.
-   Add prevent loading of videos shorter than `imageMinDuration`
-   Add Portugese locale files.
-   Add Japanese locale files.

## 8.61.0 | 2023-08-01

-   Add `createMarkupEditorOptionsControl` helper method to create custom option controls for the style control bar.
-   Fix issue with Safari 16.5 on iOS having trouble processing big images.
-   Fix issue where redaction logic would run even with no redaction shapes defined.

## 8.60.15 | 2023-07-25

-   Fix issue introduced in 8.58.0 where typing an ampersand would throw an error when text format was not set to `'html'`.

## 8.60.14 | 2023-07-24

-   Fix issue where a hidden toolbar combined with custom CSS top inset would result in crop rectangle corners being misaligned.

## 8.60.13 | 2023-07-20

-   Fix issue where sticker util would not show if no stickers defined but `stickerEnableSelectImagePreset` was `true`.

## 8.60.12 | 2023-07-06

-   Fix changelog missing from npm repositories.
-   Fix issue with text alignment on Firefox when font size above 1000 pixels.

## 8.60.11 | 2023-07-04

-   Fix `legacyDataToImageState` not correctly handling `0` rotation value.
-   Fix `alwaysOnTop` missing from `Shape` type declaration.
-   Fix incorrectly named media duration reading step in `imageReader` process.
-   Fix issue with font size on Firefox being incorrect on large images.

## 8.60.10 | 2023-06-29

-   Fix incorrect Fill plugin import in Chinese locale files.

## 8.60.9 | 2023-06-28

-   Fix issue with measure loop not correctly detecting editor visibility when creating and destroying multiple editors simultaneously.

## 8.60.8 | 2023-06-28

-   Fix video performance issues on Firefox.

## 8.60.7 | 2023-06-26

-   Fix integration issues with external plugins like the video extension.

## 8.60.6 | 2023-06-26

-   Fix issue with Redact tool being active for video content.

## 8.60.5 | 2023-06-26

-   Fix issue with image crop limit to bounds no longer working.
-   Fix issue with measure loop not resuming when hiding a primary editor and subsequently showing a secondary editor.

## 8.60.4 | 2023-06-19

-   Fix issue with MacOS trackpad zooming in markup editor being too slow.

## 8.60.3 | 2023-06-16

-   Fix issue where setting `stickers` after default editor load would not enable sticker util.
-   Fix problem with media writer TypeScript types.

## 8.60.2 | 2023-06-06

-   Fix issue where transparency grid would not fill crop area.

## 8.60.1 | 2023-06-06

-   Fix transition between transparency grid and background-color.

## 8.60.0 | 2023-06-06

-   Add transparency grid. Set `enableTransparencyGrid` to `true` to enable.

## 8.59.1 | 2023-06-05

-   Fix issue where ellipse and rounded rectangles wouldn't draw correctly during creation phase.

## 8.59.0 | 2023-06-05

-   Add `imageRedactionRendering` property, set to `'auto'` to enable blurry instead of pixely redactions. Safari currently lacks the necessary APIs so will fallback to the pixel style.
-   Fix issue where sometimes black borders would shown around redacted areas.
-   Fix issue with size warning showing when editor has size.

## 8.58.4 | 2023-06-02

-   Fix issue with Chrome render precision when wrapping text.

## 8.58.3 | 2023-05-31

-   Fix text wrapping issue when resizing text box.

## 8.58.2 | 2023-05-26

-   Fix issue where having multiple modals open at the same time at a certain window size would cause the editor to resize in endless loop.

## 8.58.1 | 2023-05-26

-   Improve internal error handling when loading images and videos.
-   Improve warning shown when loading file with type `'application/octet-stream'`.
-   Improve warning shown when editor has no dimensions.

## 8.58.0 | 2023-05-23

-   Add `format` property to text shape. Defaults to `'text'`, set to `'html'` to enable inline text formatting with Bold, Italic, Underline, and Strikethrough.
-   Add `willRenderShapeTextControls` hook to modify controls rendered in the text controls menu.
-   Add Norwegian locale files.
-   Update `'zoom'` event, now also fires on image load.
-   Extract example projects and component packages to the [PQINA GitHub repository](https://github.com/orgs/pqina/repositories?q=pintura).

## 8.57.12 | 2023-05-15

-   Fix issue where software rendering mode didn't correctly clean up sticker shapes when dragging out of view.

## 8.57.11 | 2023-05-15

-   Fix issue that caused image to not render when switching to other tab after drag operation.
-   Fix issue where rotation input stopped working when tabbing to another window while dragging.

## 8.57.10 | 2023-05-13

-   Fix issue where tab panels were too wide on React Native.

## 8.57.9 | 2023-05-11

-   Fix image writer store type in TypeScript declaration file.
-   Fix issue with SSR because of `window` usage.
-   Fix render issue on Edge 112 and Chrome 113.

## 8.57.8 | 2023-05-10

-   Fix Angular component peer dependencies.

## 8.57.7 | 2023-05-10

-   Update Angular component to work with Ivy.

## 8.57.6 | 2023-05-09

-   Fix issue with incorrect lowercase and uppercase use in locale files.
-   Add TypeScript declaration files to locale folders.

## 8.57.5 | 2023-05-05

-   Fix issue where using a canvas element as a shape background would throw an error.

## 8.57.4 | 2023-05-02

-   Fix issue where a disabled style on a markup tool could be overwritten by changing a style on another tool.

## 8.57.3 | 2023-05-01

-   Fix issue where render loop would keep running when editor was hidden.
-   Fix issue where `tapToAddText` would add text outside of canvas when tapping at edges.
-   Fix issue where mousedown would get stuck when dragging a shape and then switching to another window.
-   Fix issue where changing `strokeWidth` with the dropdown in the UI would result in invalid color value.
-   Extend TypeScript declaration file with `PinturaImageState` type.

## 8.57.2 | 2023-04-20

-   Fix issue where using the `%` symbol in a text would sometimes throw an error.

## 8.57.1 | 2023-04-13

-   Fix problem where history index wasn't correclty set when running `updatingImage`

## 8.57.0 | 2023-04-13

-   Add `'writehistory'` event.

## 8.56.1 | 2023-04-07

-   Improve Angular adapter components to also proxy editor instance public functions.

## 8.56.0 | 2023-04-07

-   Add Fill util, set `fillOptions` to array of colors or images to use for image background fill.
-   Fix issue where changing undo action would not select correct frame.
-   Further improve conversion of legacy image state.

## 8.55.0 | 2023-04-06

-   Add support for shapes in videos, Annotate, Decorate, and Sticker utils will automatically be enabled when loading a video file.

## 8.54.5 | 2023-04-04

-   Further improve conversion of legacy image state.

## 8.54.4 | 2023-04-03

-   Improve handling of legacy image state in FilePond poster plugin.

## 8.54.3 | 2023-04-03

-   Fix issue where in rare situations a click on a control inside a scrollable element wasn't registered.

## 8.54.2 | 2023-03-31

-   Fix issue where `legacyDataToImageState` didn't correctly convert FilePond legacy state to Pintura state.

## 8.54.1 | 2023-03-31

-   Fix TypeScript declaration file for `findNode` helper function.

## 8.54.0 | 2023-03-29

-   Add Italian, Swedish, and Hindi locales.

## 8.53.6 | 2023-03-28

-   Fix issue where `legacyDataToImageState` function didn't correctly convert legacy state.

## 8.53.5 | 2023-03-28

-   Fix issue where `findNode` would return the correct node.
-   Fix issue where `enableBrowseImage` was missing from TypeScript declarations.

## 8.53.4 | 2023-03-23

-   Fix issue where a fixed selection could not expand to fill stage.

## 8.53.3 | 2023-03-23

-   Fix issue where Pintura would sometimes output corrupt image on Chrome.
-   Fix issue where `imageCropMinSize` would cause crop selection to sometimes exceed stage bounds.

## 8.53.2 | 2023-03-16

-   Improve Chrome version selector to target all Chrome versions.

## 8.53.1 | 2023-03-16

-   Extend Chrome version selector to work around bug introduced in Chrome 109.
-   Fix missing imports in locale files.

## 8.53.0 | 2023-03-16

-   Add generic locale import to pintura package.

## 8.52.3 | 2023-03-14

-   Fix issue with software rendering not updating shape `backgroundImage` when image load was delayed.
-   Improve markup editor zooming with Mac touchpad.

## 8.52.2 | 2023-03-03

-   Fix missing options parameter to disable default option on font size and line height controls.

## 8.52.1 | 2023-03-02

-   Fix `createDefaultMediaWriter` export and `imageTrim` property missing from TypeScript declaration file.
-   Fix `createDefaultMediaWriter` logic missing from React video example.

## 8.52.0 | 2023-02-28

-   Add `zoomMaskOpacity` to control opacity of overlay shown behind UI when zooming in.

## 8.51.11 | 2023-02-27

-   Fix issue where software rendering would render black background after viewport resize.

## 8.51.10 | 2023-02-17

-   Fix issue reading JPEG with large APP1 header.

## 8.51.9 | 2023-02-15

-   Fix interaction issues with zooming and panning in Filter and Fintune utils on Android.

## 8.51.8 | 2023-02-08

-   Fix crop and shape edge selectors being difficult to adjust as a result of bug in Chrome v109.

## 8.51.7 | 2023-02-08

-   Fix issue with Android devices sometimes outputting a black image.

## 8.51.6 | 2023-02-07

-   Fix issue where updating the `markupEditorToolStyles` property would not trigger update of styles.
-   Fix issue where `processImage` Promise would not reject when loading unsupported file format.

## 8.51.5 | 2023-01-25

-   Fix issue with `@pqina/pintura-angular` module not working in production build on Angular 8.

## 8.51.4 | 2023-01-20

-   Fix issue where trim locale file was named `en_gb` instead of `en_GB`
-   Fix issue where path tool translations were missing.
-   Fix double locale name, can now import `locale/en_GB/annotate/index.js` instead of `locale/en_GB/annotate/en_GB.js`.
-   Add locale files to the npm package `@pqina/pintura/locale`

## 8.51.3 | 2023-01-17

-   Fix issue where Android emulator on Intel would not return a valid image Blob when calling `toBlob` during image processing.
-   Fix `backgroundSize` value `width` and `height` only being applied when `backgroundPosition` was set.
-   Fix TypeScript declaration missing types for annotate and decorate utils.
-   Fix React component TypeScript declaration missing Vector type.
-   Update SvelteKit preset based on 1.0 version of the framework.

## 8.51.2 | 2023-01-12

-   Fix `backgroundSize` and `backgroundImage` missing from `Shape` definition in TypeScript declarations file.
-   Fix issue where editing text would throw error after switching betweens ticker and annotate view.
-   Fix issue where reading Pintura output video's would not work on Chrome.

## 8.51.1 | 2023-01-10

-   Fix problem with text input after switching between decorate, annotate, or redact utils.

## 8.51.0 | 2022-12-20

-   Add `cropMaskOpacity` property to control opacity of mask shown in crop util.
-   Fix markup editor tool styles not always retaining their styles when switching between utils.
-   Fix issue where text was sometimes incorrectly rendered on new line.

## 8.50.1 | 2022-12-19

-   Fix issue where video would still continue playing when processing or closing the editor.
-   Update NextJS example.

## 8.50.0 | 2022-12-16

-   Add `willSetMediaInitialTimeOffset` to control which time offset is initially shown when a video is loaded, by default Pintura loads the center of the first clip range.
-   Add `muteAudio` property that sets the initial state of the audio mute button, defaults to `true`.
-   Add calling `abortProcessImage` method now closes the process error screen.
-   Add guard against `application/octet-stream` file types, Pintura will now try to guess if the src is an image or video, a warning is shown in console if the mime tyep is set incorrectly.
-   Fix issue where video would continue playing during processing.
-   Fix issue where video would continue playing when closing the editor.
-   Fix issue where image processing error would not show.
-   Fix issue with aborting video processing not working.

## 8.49.3 | 2022-12-13

-   Fix issue where `enableZoomControls` could no longer be used to disable zoom controls.
-   Fix issue where when `layoutVerticalToolbarPreference` was set to `'bottom'` and only one util was active the image was rendered outside of the editor view.

## 8.49.2 | 2022-12-12

-   Fix issue where setting same Blob object to `src` prop would reload image.
-   Fix issue where selecting a size preset in the crop preset options dropdown would throw an error.
-   Fix issue where pan and zoom would sometimes not work when switching between utils.
-   Fix issue with sliders in the frame util not working.

## 8.49.1 | 2022-12-08

-   Fix special symbol input being invisible for auto width text shapes.
-   Fix issue where pan / zoom input would not work when only a single util was active.

## 8.49.0 | 2022-12-07

-   Add CMD+D and CTRL+D to duplicate currently active shape (if allowed by shape).
-   Add `disableNewline` property to text shapes. Set to `false` on default auto-width text shape to allow newlines in. Set to `true` on fixed-width text shapes to prevent newlines.
-   Automatically remove text with newlines in auto-width text shapes when loading shapes if `disableNewline` is not set to `false`.
-   Auto width text fields that support newlines now also support text-align, the `textAlign` property needs to be defined on the default shape to enable this.
-   Improved visiblity of text caret by lowering opacity of text selection border while editing.

## 8.48.3 | 2022-11-28

-   Fix multi-touch input not working in markup editor.

## 8.48.2 | 2022-11-24

-   Fix SSR issue introduced with version 8.48.0.

## 8.48.1 | 2022-11-23

-   Fix TypeScript declarations.

## 8.48.0 | 2022-11-22

-   Add `enableCanvasAlpha`, set to `true` to make editor canvas transparent.
-   `imageStateToCanvas` now forces even size for video sources.

## 8.47.1 | 2022-11-14

-   Fix issue where `imageStateToCanvas` was missing from TypeScript declaration file.
-   Add defensive styles to prevent CSS collisions.

## 8.47.0 | 2022-11-08

-   Add support for detecting and reading video length and size.
-   Add readonly `duration` property, is `0` for image data, contains length in seconds for video.
-   Add `imageTrim` property to set trim ranges for video.
-   Add `imageStateToCanvas` helper function, use to draw current image source and `imageState` to a canvas element.
-   Add `createDefaultMediaWriter` export, use to combine image and video writers.

## 8.46.1 | 2022-11-04

-   Fix error thrown when loading new images.

## 8.46.0 | 2022-11-03

-   Add `enablePanLimit`, defaults to `true` set to `false` to prevent limiting pan to center of stage.
-   Add `panLimitGutterScalar`, defaults to `0`, set between `0` and `1` to allow some spacing around the bounds used to limit image panning.
-   Add automatic handling of `null` values when restoring `imageState`.
-   Fix issue where zoom/pan would not work correctly with when `previewUpscale` was set to `true`.
-   Fix issue where path tool would not work in React native when passing default markup styles.
-   Fix issue where resize tool 100% zoom level would not be set.
-   Fix issue where `className` prop was missing from `PinturaEditorModal` React component type declarations.

## 8.45.2 | 2022-10-31

-   Fix issue where setting a file object as `backgroundImage` source would throw an error.

## 8.45.1 | 2022-10-27

-   Fix issue where editor would throw `contains` error.
-   Add React Native TypeScript example project.

## 8.45.0 | 2022-10-25

-   Enable canvas zoom and pan on all utils except crop and resize. Disable by setting `enablePan` and `enableZoom` to `false`.
-   Add generic zoom and pan properties.
-   Deprecate markup editor zoom and pan properties.
-   Fix issue where markup editor would not automatically switch to move tool when adding text with `tapToAddText` set to `true`.
-   Change crop zoom control label to "scale" to prevent confusion with zoom dropdown in other utils.

## 8.44.1 | 2022-10-17

-   Fix bug where text shapes added with `tapToAddText` were rendered with incorrect size.
-   Fix issue where when `imageCropLimitToImage` was set to `false` and an `imageCropAspectRatio` was set the image would not be contained in the crop rectangle.

## 8.44.0 | 2022-10-11

-   Add `dataSizeScalar` property to `createDefaultImageScrambler` to allow for more detailed blurring, defaults to `1`.
-   Add `imageBackgroundImage` property, set to an image source to draw an image behind the main image.
-   Fix `imageBackgroundColor` not being applied to filter previews.
-   Fix color filters being applied incorrectly to transparent images.

## 8.43.1 | 2022-09-29

-   Fix issue with keyboard navigation not working correctly in scrollable containers.
-   Fix issue where path would be drawn when attempting to select a shape.
-   Fix issue where if `cropLimitToImage` was set to `false` the image was still zoomed in when rotated.

## 8.43.0 | 2022-09-27

-   Add path tool for drawing multi-corner paths and polygons.
-   Add support for drawing simple polygons, simple polygons are polygons that don't have intersecting lines.
-   Fix issue where 180 degree initial rotation would result in negative crop size.

## 8.42.1 | 2022-09-26

-   Fix issue with NextJS 12.3.x throwing an error while applying markup shapes during image processing.

## 8.42.0 | 2022-09-26

-   Add `request` property to `imageReader` to allow passing custom headers and setting withCredentials on the request.
-   Add `headers` and `credentials` properties to `store` property on `imageWriter` to allow passing custom headers and setting withCredentials on the request.
-   Fix script reference in `pintura-input` example.

## 8.41.3 | 2022-09-23

-   Fix issue where keyboard navigation with arrows would trigger page scroll.

## 8.41.2 | 2022-09-21

-   Fix `cropSelectPresetFilter` missing from TypeScript definitions.

## 8.41.1 | 2022-09-20

-   Fix issue where color picker selected value wasn't updated when color was changed programmatically.
-   Fix issue where setting new values to the `markupEditorToolStyles` property would not reset current selected styles.
-   Fix issue where 'selectcontrol' event would fire before markup editor was fully activated.

## 8.41.0 | 2022-09-19

-   Add `markupMaskOpacity` property which controls the opacity of the mask rendered on top of shapes outside of the image crop. Defaults to `1`, hiding all markup outside of the image crop. Set to lower value to show markup outside of the image crop, set to `0` to render markup outside of image crop area at 100% opacity.

## 8.40.2 | 2022-09-14

-   Fix issue where editor would stall when switching utils.

## 8.40.1 | 2022-09-14

-   Fix issue where image mask opacity would sometimes not be set to `1` when switching between crop and other utils.
-   Fix issue where XMP and MPF data was not copied to JPEG headers.

## 8.40.0 | 2022-09-13

-   Add `'tapcanvas'` event, fires when the markup editor canvas is tapped.
-   Add `'selectcontrol'` event, fires when a markup editor tool is selected.

## 8.39.0 | 2022-09-09

-   Fix issue where React Native webview proxy would not correctly pass string event details to native layer.

## 8.39.0 | 2022-09-08

-   Add `'selectutil'` event, fires when a util panel is selected, receives the selected util name.

## 8.38.4 | 2022-09-06

-   Fix issue where "Presets" caption for the color selector was not translated and renamed caption to "Color palette".

## 8.38.3 | 2022-09-02

-   Fix issue where image would animate in from bottom of view.

## 8.38.2 | 2022-08-31

-   Fix issue where the Pintura Modal component would not correctly render when in React Strict Mode.

## 8.38.1 | 2022-08-30

-   Fix TypeScript definitions for `blobToFile`, `finetuneOptions`, and `frameOptions`.
-   Replace symbols in locale files with html entities.
-   Upgrade React and NextJS example projects to use React 18.2.

## 8.38.0 | 2022-08-09

-   Fix issue where a slight grey line would be drawn to the left and right of the main image in preview mode.
-   Add support for setting `ImageData` and `ImageBitmap` as image source.
-   Add `'markupzoom'` and `'markuppan'` events to observe zooming and panning in markup editor.

## 8.37.1 | 2022-08-04

-   Fix issue where `processDefaultImage` would not apply frame or line styles.

## 8.37.0 | 2022-07-28

-   Updated NextJS preset to version 12.
-   Fix issue where `willRenderShapeControls` would throw error after calling `addPreset` from `willRenderShapePresetToolbar`.
-   Add `layoutVerticalControlGroupsPreference` set to `'top'` to move control groups to top.
-   Add `layoutVerticalControlTabsPreference` set to `'top'` to place tabs inside controls groups above controls.
-   Add `layoutVerticalToolbarPreference` set to `'bottom'` to move main toolbar to bottom of view.

## 8.36.2 | 2022-07-22

-   Fix issue where window width and height variables weren't correctly assigned on orientation change.

## 8.36.1 | 2022-07-22

-   Fix issue on Ionic where reset indicator line was drawn incorrectly.
-   Fix tablist and sticker HTML buttons not being of type `"button"` causing accidental parent form submits.
-   Fix issue where window width and height variables wouldn't be correctly updated on Cordova based apps.
-   Fix issue where shape opacity label would not match opacity of shape when switching from shape with adjusted opacity to another shape.
-   Fix issue where shift + scroll scroll direction was reversed.
-   Fix issue where zoom level was reset when switching views.

## 8.36.0 | 2022-07-19

-   Add `markupEditorZoomLevel` to programmatically control the current zoom level.
-   Add `markupEditorToolRetainStyles`, set to `true` to retain markup editor tool styles when loading a new image.
-   Fix issue with `disableMove` not being set on path when using `createMarkupEditorToolStyle('path')`

## 8.35.1 | 2022-07-15

-   Fix slight opacity dip during image load in Chrome.

## 8.35.0 | 2022-07-15

-   Add `previewPad` property, set to `true` to show padding around image preview when a frame is selected that renders on the outside of the image.
-   Add `previewMaskOpacity` property to control the opacity of the mask that is rendered on top of shapes outside of the image.
-   Add support for `'never'` value to `cropMinimizeToolbar` property, when set to `'never'` the crop toolbar will never be minimized.
-   Add `willRenderCanvas` state parameter to TypeScript declarations.

## 8.34.0 | 2022-07-11

-   Add `frameOutset` property to nine slice frame style. This controls if the frame image is rendered inside or outside of the crop and at which distance. Use negative value to add margin around frame image and crop edge.

## 8.33.2 | 2022-07-07

-   Fix issue where background color on fixed with and auto height text shapes would not align in the decoration util.

## 8.33.1 | 2022-07-05

-   Fix issue where Angular component package prevented use with Angular 13.

## 8.33.0 | 2022-07-04

-   Add `markupEditorZoomAdjustWheelFactor` to control zoom speed in markup editor.
-   Add slight multiplier to Firefox and Safari scroll wheel interactions to make those a bit snappier.
-   Add remove shape by pressing Delete key.
-   Add base TypeScript declarations for Vue.

## 8.32.3 | 2022-06-29

-   Fix issue where using a normal frame shape instead of a shape that required preprocessing would throw an error.

## 8.32.2 | 2022-06-27

-   Fix issue with vertical interactions triggering footer navigation on Android for Firefox.

## 8.32.1 | 2022-06-24

-   Fix preset tab alignment on narrow viewports.

## 8.32.0 | 2022-06-23

-   Add support for passing custom shape preprocessor to `createDefaultShapePreprocessor`.
-   Add support for defining custom shape preprocessors as array of functions when using default factories.
-   Add scale and context data to shape preprocessor context.

## 8.31.4 | 2022-06-22

-   Export internal helper functions to make shape preprocessing easier.
-   Fix issue with line and path shapes not correctly drawing when added as preset shape.
-   Fix issue where editor wouldn't read CSS color info when was initially hidden.

## 8.31.3 | 2022-06-21

-   Fix issue with remote custom fonts not loading since version `8.30.0`

## 8.31.2 | 2022-06-20

-   Fix issue where utils would render at twice the viewport width on Safari versions 14 and below.

## 8.31.1 | 2022-06-15

-   Fix issue where markup editor style controls would not scroll on narrow viewports.
-   Fix issue where corner radius control would show for stickers.

## 8.31.0 | 2022-06-14

-   Add move tool to markup editor, set `enableMoveTool` to `true` to enable, combined with `enableAutoSelectMoveTool` this makes shape interaction more natural.
-   Add `enableAutoSelectMoveTool` option to control when the editor auto switches to move tool after adding a shape. By default will switch back to move for all shape tools except the sharpie and the eraser.
-   Add view/hand tool to markup editor, set `enableViewTool` to `true` to enable, alternative to panning the view by holding spacebar.
-   Add handling of ctrl+enter / cmd+enter keys to confirm text input.
-   Add `cropRotationRange` property to control range of crop rotation input control.
-   Fix issue where escape key would cancel text input but not keep shape selected.
-   Fix issue with TypeScript naming conflict warning in react-pintura module.

## 8.30.0 | 2022-06-13

-   Scope every `pintura` package with `@pqina`.
-   Convert included example projects to installing `@pqina` packages from pqina private npm.
-   Remove Angular 8 example project as private npm module installation works with v8, v9 and newer versions of Angular.
-   Move Pintura Vue 2 components to `@pqina/vue-pintura/vue-2` path inside Pintura vue module.
-   Add `willRequest`, allows prevention of loading external resources (like `willRequestResource`) or adding request initialisers like custom headers and/or credentials to requests. Where `willRequestResource` only runs when loading external stylesheets `willRequest` will run for every resource.
-   Deprecated `willRequestResource` in favour of `willRequest`.

## 8.29.5 | 2022-06-08

-   Fix issue where range input wasn't centered on mobile viewports.

## 8.29.4 | 2022-06-03

-   Improve layout handling for editor footer element and contents, no footer height is no longer fixed and scales dynamically with content.
-   Improve intro animation of preset thumbnails.
-   Fix issue where `beforeSelectShape` would not correctly supply previous selected shape when selecting the canvas.
-   Fix default control missing for rectangle corner radius.
-   Fix `stickerEnableSelectImagePreset` not working without also setting `stickerEnableSelectImage`.

## 8.29.3 | 2022-06-01

-   Fix issue where passing `imageReader` configuration options as an object would not work.

## 8.29.2 | 2022-06-01

-   Fix issue where empty text shapes with a `backgroundColor` would not show background color.
-   Fix various IME text input issues.

## 8.29.1 | 2022-05-31

-   Fix issue where applying a `backgroundColor` to a text shape did no longer work. Currently only availabe by adding the `backgroundColor` property to the default style of the text shape using `createMarkupEditorToolStyle`.

## 8.29.0 | 2022-05-30

-   Add `cropInteractionFocus`, defaults to `'image'` where the image is dragged and scaled to make a crop selection. Set this property to `'selection'` to switch to dragging and scaling the crop selection rectangle.
-   Improved clarity of images on low res screens.
-   Fix issue with incorrect zoom percentage being highlighted in the zoom level dropdown.
-   Fix issue where selecting a zoom level from the zoom level dropdown would not work after zooming in or out with mousewheel.

## 8.28.1 | 2022-05-19

-   Fix issue where a default tool was not selected if only one markup editor tool was supplied.
-   Deprecated `stickersWillRenderShapePresetToolbar`, `stickersEnableButtonFlipVertical`, and `stickerEnableSelectImage`. These properties have been replaced with `stickerWillRenderShapePresetToolbar`, `stickerEnableButtonFlipVertical`, `stickerEnableSelectImagePreset`
-   Fix issue where `stickerEnableDropImagePreset`, `annotateEnableDropImagePreset`, and `decorateEnableDropImagePreset` properties were not exported.
-   Fix exports missing for interfaces and types in Pintura TypeScript declaration file.
-   Fix `editor` property not being typed in React TypeScript declaration file.
-   Add SvelteKit example project.

## 8.28.0 | 2022-05-11

-   Add `--color-transition-duration` custom property to control background color transition duration, defaults to `250ms`.
-   Add `grabbing` cursor style when canvas is panned.
-   Add matching theme style to panel controls. Set `--color-background` and `--color-foreground` on `.pintura-editor-panel` to adjust panel theming.
-   Add subtle lens effect to Color Picker opacity control.
-   Fix issue where flip control was disabled for stickers by default.
-   Fix issue with default resize input field style looking too much like the fields were disabled.
-   Fix issue where some UI controls were still animated even if `animations` was set to `'never'`.
-   Fix issue where setting `elasticityMultiplier` to `0` would make image invisible.
-   Fix issue where top shape could be moved to top, move to front button now switches to disabled state.
-   Fix issue where changing font would throw an error with external stylesheet loaded.
-   Fix issue where Pintura would sometimes throw an error when being destroyed but no image was loaded.
-   Fix issue where you could zoom the markup editor canvas and move, rotate, or resize shapes at the same time.
-   Fix issue where Color Picker slider was difficult to select near plus/minus buttons.
-   Fix issue where image sometimes looked blurry on low res displays.

## 8.27.2 | 2022-05-09

-   Add Dutch locale.
-   Fix issue where editor in overlay mode would not correctly present small images when the editor container was resized.
-   Fix issue where not all properties were exposed as `@Input()` on Angular component.
-   Fix issue where properties on `PinturaDefaultImageScramblerOptions` were not optional.
-   Fix issue where empty editor instance would block scroll on iOS.

## 8.27.1 | 2022-04-19

-   Fix issue where loading custom fonts with `@import` wouldn't work.
-   Fix issue where text shape would be hidden when switching to a different util while editing text.

## 8.27.0 | 2022-04-07

-   Add missing `editor` export to Svelte components.
-   Change locale property to merge new set values with existing value making it easier to overwrite labels.
-   Change Angular components to expose individual editor properties additional to the single options property.

## 8.26.4 | 2022-04-04

-   Fix issue where HTML tags would be parsed in text field.

## 8.26.3 | 2022-03-31

-   Fix issue where redactions would not render when clarity tool was set to other value than zero.

## 8.26.2 | 2022-03-28

-   Fix issue where calling `redraw` from one of the `willRender` hooks wouldn't redraw canvas.
-   Fix issue where no history entry was created when confirming text entry.

## 8.26.1 | 2022-03-21

-   Fix issue where text input box would not be positioned correctly when image fit in editor stage.

## 8.26.0 | 2022-03-18

-   Add `markupEditorZoomLevels` to control the zoom levels shown in the markup editor zoom dropdown.
-   Add `markupEditorZoomAdjustStep` to control the speed at which pressing the zoom buttons increases or decreases zoom.
-   Add `markupEditorZoomAdjustFactor` to control the factor used to increase or decrease zoom speed when holding the zoom buttons.
-   Add options parameter to `createMarkupEditorFontFamilyControl` so default option can be disabled by passing `{ defaultKey: undefined }`
-   Optimise Pintura React Native component to clear unused Blob properties before converting to Base64 encoded DataURIs.
-   Fix issue where the Pintura React Native component wouldn't correctly detect Safari.
-   Fix issue where the Pintura React Native component wouldn't remove `src` property from process output.
-   Fix issue where setting `imageReader` or `imageWriter` props on the Pintura React Native component would crash the editor.

## 8.25.1 | 2022-03-11

-   Fix issue with editor outline missing and throwing error when editor wrapped in web component with shadow dom.
-   Fix issue where second argument, parent element, for `openDefaultEditor` could not be passed.

## 8.25.0 | 2022-03-07

-   Add `markupEditorWillStartInteraction` which allows intercepting the markup interaction start event. It receives the position of the mouse and the position of the canvas. Return `true` to proceed with interaction, or `false` to prevent interaction.
-   Add `enableZoom` and `enablePan` to toggle zoom and pan interaction functionality.
-   Fix iOS 15 modal issue where dragging inner elements would toggle iOS Safari footer if some children of body element had absolute positioning.

## 8.24.2 | 2022-02-25

-   Improve handling of errors thrown in will render hooks, errors thrown in these hooks will no longer crash the editor.
-   Add Ionic 6 preset template.

## 8.24.1 | 2022-02-16

-   Fix issue where image size requirements wouldn't be respected when loading subsequent images.
-   Fix issue with `disableSelect` not working.

## 8.24.0 | 2022-02-10

-   Custom store functions may now return `FormData` object.
-   Fix issue with `findNode` function throwing an error.

## 8.23.3 | 2022-02-07

-   Fix issue where detail panel would throw an error when it was active and user switched utils.
-   Fix issue where DynamicPanel would always replace root on update, even if root node was unchanged.
-   Fix issue where editor toggle panels would move when scrolling the page.
-   Fix issue where editor would not always detach panels correctly.
-   Fix issue where editor moving focus to panel would cause page to scroll.
-   Fix issue where text selection would not work in markup editor.

## 8.23.2 | 2022-02-04

-   Fix text texture size exceeding maximum texture size on Android.
-   Fix issue where presets tool would not appear when only setting `willRenderPresetToolbar`.
-   Fix React TypeScript declarations, event content now described better.
-   Fix Angular TypeScript declarations, event content now described better.

## 8.23.1 | 2022-02-01

-   Fix label in `cropSelectPresetOptions` showing on small viewports.

## 8.23.0 | 2022-01-31

-   Add `cropSelectPresetFilter`, set to `'landscape'` or `'portrait'` to show tabs in preset dropdown and filter landscape aspect ratios.
-   Add `cropEnableFilterMatchAspectRatio`, set to `false` to prevent swapping aspect ratio when switching between preset tabs.
-   Add fourth parameter imageState to `preprocessImageSource` image writer hook.
-   Fix issue with `findNode` function not correctly searching through lists of nodes.
-   Fix rendering dropdown panels on half pixels causing slight blurring of panel content.
-   Fix bug where on Android text input would scale modal height.

## 8.22.1 | 2022-01-26

-   Fix issue with temporary file input not being hidden properly.
-   Fix issue where zoom level would not be reset when loading a new image.

## 8.22.0 | 2022-01-25

-   Add mousewheel zoom to annotation, decoration, redaction, and sticker views.
-   Add space + mouse drag to annotation, decoration, redaction, and sticker views.
-   Add zoom towards mousewheel position.
-   Add zoom level dropdown to toolbar.
-   Add zoom in and zoom out button to toolbar.
-   Add hold to increase zoom speed to zoom buttons.
-   Add fit option to zoom level dropdown.
-   Add actual size option to zoom level dropdown.
-   Add animated zoom percentage indicator.
-   Add snap fit to view when using mousewheel.
-   Add `enableZoomControls` property to turn on/off the zoom controls.
-   Add sticker position lock, if sticker shape has `x` and/or `y` coordinate it will snap to that position.
-   Change spacing between util menu and stage to be smaller.
-   Change cursor used for rotation shape control from move to grab cursor.
-   Change orchestration of view activation and deactivation, now all views are first deactivated before selected view activates.
-   Change presentation of polaroid frame, now no longer zooms out main image.
-   Change centering of undo/redo buttons on compact viewports, middle tools now auto centered to view.
-   Fix shape selection lines so they align with selected shape when animating views.
-   Fix issue where `'is-animated'` env property would toggle between `true` and `false` when interacting with shapes.
-   Fix context menu not working for inline text input.

## 8.21.1 | 2022-01-21

-   Fix issue where `'selectstyle'` wasn't available in framework wrappers.

## 8.21.0 | 2022-01-18

-   Add `'selectstyle'` event to listen for input on style controls in markup editor.
-   Fix issue where interacting with opacity control would result in a lot of history entries.
-   Fix Safari 15 bug where sticker select image button would not work on iOS.

## 8.20.8 | 2022-01-17

-   Fix issue with force redrawing editor not working in `willRenderToolbar` and `cropWillRenderTools` after changing external data.
-   Fix background color label being incorrect.

## 8.20.7 | 2022-01-14

-   Fix issue where setting `cropSelectPresetOptions` to an empty array would crash the editor.
-   Fix issue where `backgroundColor`, `strokeColor`, and `color` style components could not receive `enablePicker`, `enableOpacity`, `enablePresets` props to control color picker components.
-   Fix issue with editor instance in Angular component being protected.

## 8.20.6 | 2022-01-13

-   Fix issue where adding a sticker would not fire the `"addshape"` event.
-   Fix issue where switching utils while editing text would throw.

## 8.20.5 | 2022-01-11

-   Fix issue with slider control label not updating in frame editor.
-   Fix issue where 9-slice frame showed color style control.

## 8.20.4 | 2022-01-10

-   Fix issue where editor would throw an error if resize util was selected as first util to show.
-   Fix issue where editor would throw if 9 slice frame slices overlapped.
-   Fix issue where text was invisible when shape `isEditing` property was set to true and `markupEditorTextInputMode` was set to `'modal'`.

## 8.20.3 | 2022-01-07

-   Fix issue where upscaled decoration and annotation would be drawn at lower resolution than possible.
-   Fix issue where shape backgrounds could be drawn at `0` width and the image processing step would throw an error.
-   Fix issue where `canvasMemoryLimit` wasn't taken into account when drawing shape background images.
-   Fix issue where shape `right` and `bottom` positions where calculated incorrectly when set to percentage value.
-   Fix issue with text input modal throwing an error when deselecting text.
-   Fix issue with rotated inline text not aligning correctly.
-   Fix issue where text input modal would reselect text when switching to emoji keyboard.
-   Fix issue with `isSafari` function throwing error on SSR environment.

## 8.20.2 | 2022-01-03

-   Fix issue where outdated font mime types would not be correctly interpreted.

## 8.20.1 | 2021-12-29

-   Fix issue with shape alignment when `devicePixelRatio` was not `2`

## 8.20.0 | 2021-12-29

-   Add `previewImageTextPixelRatio` to control resolution of text shapes, defaults to `window.devicePixelRatio`.
-   Add `"tapshape"` event, is fired when an already selected shape is clicked.
-   Change render loop to render annotations in view space improving clarity of shapes.
-   Change resolution of text shapes, now renders at higher resolution on high retina displays.
-   Change `strokeWidth` style control, when a width is selected the `strokeColor` opacity is now automatically set to `1` if it is `0`.
-   Fix issue where `"selectshape"` event was fired even when shape was already selected.

## 8.19.4 | 2021-12-27

-   Change render loop to no longer redraw/compute annotations, decorations, redactions, and frame styles if no change to shapes or canvas was detected.
-   Fix issue with `'NaN%'` values on shape drafts.
-   Fix issue with custom fonts not being preloaded correctly.
-   Fix issue where hover outline would be rendered when dragging stickers.
-   Change Svelte preset depedencies, now at latest versions.
-   Add Capacitor example project.

## 8.19.3 | 2021-12-22

-   Fix issue with image edit button not showing in FilePond.

## 8.19.2 | 2021-12-21

-   Fix issue where setting `imageState` on FilePond item would not update poster.
-   Fix issue where multiple `processImage` calls in close succession would fail to output big images.
-   Improve performance of FilePond Image Editor plugin, image posters are now generated faster and processing of images is queued allowing for FilePond to stay responsive. Requires updating the FilePond Image Poster plugin.
-   Fix issue where `eraseRadius` shape property couldn't be exposed as style control.
-   Fix issue where an increased `eraseRadius` wouldn't properly remove multiple smaller shapes.
-   Fix issue caused by `imageEditorAfterWriteImage` not returning a Promise.
-   Fix issue with loading JPEGs where EXIF header is bigger than usual.

## 8.19.1 | 2021-12-14

-   Fix issue where empty markup text shape would throw error when drawing output image.
-   Fix issue where arrow style 'None' could not be selected for new arrows if an arrow style was set previously.

## 8.19.0 | 2021-12-10

-   Add `nine` frame style, use with `frameImage` property to create image based frames.
-   Fix issue where lines, paths, and ellipses added with `enableSelectToolToAddShape` were slightly too large.
-   Fix issue where lines and paths weren't drawn at correct location when image was zoomed in.
-   Fix issue with error thrown when drawing in decoration layer.

## 8.18.0 | 2021-12-08

-   Add `cropActiveTransformTool` property, set to `'zoom'` to show zoom input as active instead of `'rotation'` input.
-   Add `styleRules` property to react-native proxy component to allow adjusting editor styles.
-   Add `customProperies` location in react-native template to allow for easier adjustment of the template.
-   Fix issue with Japanese IME character composition on Windows and Android.

## 8.17.1 | 2021-12-07

-   Fix issue where `canvasMemoryLimit` would cause data in the `crop`, `annotation`, and `decoration` properties on the `imageState` output object to be scaled down.

## 8.17.0 | 2021-12-06

-   Fix `<div>` being added to the text input when returning to text edit mode.
-   Add `createDefaultFrameStyles` export to generate the default frame style object.
-   Add `createDefaultLineEndStyles` export to generate the default line end styles object.
-   Add `createFrameStyleProcessor` export to merge custom frame styles with the default frame styles.
-   Add `createLineEndProcessor` export to merge custom line end styles with the default line end styles.

## 8.16.9 | 2021-12-02

-   Fix problem where composition keys did not all work correctly and were not retained properly when blurring field after editing text.

## 8.16.8 | 2021-11-30

-   Fix issue where an invalid CSS selector in library CSS files would cause build problems.

## 8.16.7 | 2021-11-29

-   Fix issue with IME keyboard not working correctly for text input.

## 8.16.6 | 2021-11-28

-   Fix issue with frame change not creating a history entry.
-   Fix shape color changes creating many history entries.

## 8.16.5 | 2021-11-24

-   Fix issue with loading big images introduced in version 8.16.2.

## 8.16.4 | 2021-11-23

-   Improve handling of Firefox bug where it cannot determine SVG size if the SVG does not have a width or height attribute. Will now set width to `300` and height to `150`.
-   Fix issue with Safari not being detected correctly in a WebView.
-   Fix issue where React Native proxy component would stringify image preview impacting performance on iOS.

## 8.16.3 | 2021-11-22

-   Improve memory usage.

## 8.16.2 | 2021-11-12

-   Fix issue with events fired by the WebView not ending up in React Native layer on Android.
-   Improve React Native component performance, it now excludes `src` and `dest` prop from `'load'` event to lower memory usage.
-   Improve React Native component performanace, it now excludes `src` prop from `'process'` event to lower memory usage.
-   Improve React Native component, it now no longer auto converts the `'process'` event `dest` property to `Blob`, the output is now a dataURL.

## 8.16.1 | 2021-11-11

-   Fix issue where React Native preset wouldn't work on Android.

## 8.16.0 | 2021-11-10

-   Add inline text editing, set `markupEditorTextInputMode` to `'modal'` to revert to old text editing style.
-   Add `willRequestResource` hook that is run when the editor loads a remote stylesheet to determine webfont locations in `@font-face` rules. This hook enables preventing the request in case the remote server doesn't support CORS or the stylesheet doesn't contain `@font-face` rules and can be skipped.
-   Add line height property to text shapes, defaults to `120%` or `1.2 × fontSize`.
-   Add support for `backgroundColor` property on text shape.
-   Auto switch cursor style based on shape selection and hover state.
-   Improve font rendering line and word breaking accuracy.
-   Improve support for custom fonts with different weights.
-   Improve shape rendering performance.
-   Improve internal element measuring performance.
-   Improve font rendering quality in decoration view.
-   Improve redact icon style.
-   Fix issue where dropdown would not select fallback item.
-   Fix issue where dropdowns and navigation would sometimes not respond to clicks after keyboard interaction.

## 8.15.1 | 2021-11-05

-   Fix issue with shape selection outline being rendered at wrong location when changing window size.
-   Fix issue with activated shape control panels not hiding when switching between frame styles or selecting different shapes.

## 8.15.0 | 2021-10-29

-   Add `imageDataResizer` property to `createDefaultImageWriter` this property allows setting up a custom resize algorithm to improve resize quality. Useful when resizing high contrast images like logo's to very small sizes.

## 8.14.0 | 2021-10-28

-   Add React Native example project. This project loads Pintura in a WebView component and wraps the WebView in an API that mimics the normal React version of Pintura.
-   Add `history.getCollapsed()` to get history entries up to current index.
-   Fix issue where touch end events felt "slippery" when pointer events were missing `timeStamp` property.

## 8.13.4 | 2021-10-27

-   Fix issue where frame exports where missing from TypeScript declaration file.

## 8.13.3 | 2021-10-18

-   Fix issue with `previewImageData` being a required property.

## 8.13.2 | 2021-10-13

-   Fix issue where appending a space to a text line was not possible.
-   Fix issue where Firefox 93 would draw annotations set on editor initialisation incorrectly.
-   Fix issue where tapping screen to select image wasn't possible when editor was waiting for image.

## 8.13.1 | 2021-10-12

-   Fix additional iOS 15 modal issues.
-   Fix issue with incorrect redaction properties in TypeScript declarations file.
-   Fix main menu button text overflow issue for iOS 13.

## 8.13.0 | 2021-10-11

-   Add `'ready'` event which fires when the editor is ready for interaction.
-   Add `'loadpreview'` event which fires when the editor has loaded a preview image or the preview image has been updated.
-   Add `previewImageData` property to access current preview image data.
-   Fix issue where shapes were not deselected when switching between tools.
-   Fix issue with iOS 15 drawing black output image when using redact feature.
-   Improve performance of generating scrambled preview image.
-   Improve scrambling of canvas for very large redaction areas.
-   Improve Angular component TypeScript declarations.

## 8.12.2 | 2021-10-07

-   Fix redaction shape controls showing re-order button.
-   Improve default scramble by setting default amount to `4`.
-   Improve handling of transparent images.
-   Fix issue where scrambled version of transparent image would not inherit `imageBackgroundColor`.
-   Fix issue with Firefox 93 not rendering preview image correctly.

## 8.12.1 | 2021-10-06

-   Fix issue with scrambled image not aligning with preview image when image was flipped.
-   Fix issue with Safari not positioning redacted shapes correctly.

## 8.12.0 | 2021-10-05

-   Add `'redact'` util. Use to blur or scramble information in an image. By defaults blurred parts of the image are scrambled and then blurred to make sure information cannot be retrieved.
-   Add `imageScrambler` property which can be set to a function that handles scrambling the image data for use with the redact util.
-   Add `createDefaultImageScrambler` export which creates a default image scrambler.
-   Add ability to select paths created by Sharpie. To prevent users from selecting paths add `disableSelect` to the default path style.
-   Improve image preview update speed for canvas sources.
-   Fix issue with image state not restoring correctly when using `updateImage`
-   Fix issue with interface gradient overlay not rendering.
-   Fix Angular v9 preset project.

## 8.11.0 | 2021-09-30

-   Add `layoutHorizontalUtilsPreference`, set to `'right'` to move the main navigation to the right side of the editor.
-   Add `layoutVerticalUtilsPreference`, set to `'bottom'` to move the main navigation to the top of the editor. Will not affect mobile presentation where the menu will stick to the bottom.
-   Add `enableAutoDestroy` to modal options, prevents the modal from cleaning up after hiding.
-   Add `enableAutoHide` to modal options, prevents the modal from automatically hiding after processing an image.
-   Add `preventScrollBodyIfNeeded` to modal options, prevents iOS footer lock logic which isn't needed in mobile app context.
-   Add `preventFooterOverlapIfNeeded` to modal options, prevents iOS footer spacing logic which isn't needed in mobile app context.
-   Fix issue with overlay mode showing double buttons when scaled very large.
-   Fix issue with additional history entry when editor was in overlay mode.
-   Fix issue with typescript declarations not having `shapePreprocessor` prop for `processImage` export.

## 8.10.3 | 2021-09-28

-   Fix issue with annotation buffer size exceeding max texture size.
-   Fix issue with overlay editor not zooming in images smaller than editor itself.
-   Improve modal rendering on iOS Safari 15.
-   Improve Cordova template.

## 8.10.2 | 2021-09-27

-   Fix issue with FilePond Image Editor plugin not being packaged correctly in Angular v9 preset.
-   Fix issue with removing markup not correctly updating history state.
-   Fix issue with Safari 15 new memory limitations on canvas element.
-   Improve modal rendering on iOS Safari 15.
-   Improve modal fade out animation.

## 8.10.1 | 2021-09-22

-   Fix issue with `z` key triggering undo action.
-   Fix issue where scroll offset wasn't restored when closing modal on iOS Safari 15.
-   Fix issue where page was scrolled before modal completely covered view.
-   Fix issue where modal didn't create a `theme-color` tag if no `theme-color` tag was available in document head.
-   Improve `createImageBitmap` usage on Safari 15 for images that don't have an orientation header.
-   Improve Angular v9 preset to include FilePond.

## 8.10.0 | 2021-09-21

-   Add temporary warning when shapePreprocessor is not defined and shape with `lineEnd` or `lineStart` style is selected in markup editor.
-   Improve menu item rendering to allow wrapping of labels.
-   Add Spanish locale files.
-   Add German locale files.
-   Add French locale files.
-   Add Russian locale files.
-   Add Chinese Simplified locale files.
-   Fix issue with Safari 15 incorrectly applying JPEG EXIF orientation in createImageBitmap.
-   Fix issue with iOS Safari 15 incorrectly positioning modal.
-   Fix issue with iOS Safari 15 initiating pull-to-refresh while interacting with editor.
-   Fix issue with iOS Safari 15 scaling addressbar footer while interacting with editor.
-   Fix issue with iOS Safari 15 not correctly reporting viewport height and rendering text input at wrong location.
-   Sync meta element `theme-color` with editor background color.

## 8.9.1 | 2021-09-16

-   Fix issue where close button wouldn't show when image load failed.
-   Fix issue where undo/redo keyboard shortcuts would block picking tool in markup editor.

## 8.9.0 | 2021-09-15

-   Add `resizeSizePresetOptions` to enable showing a dropdown with size presets.
-   Add `resizeWidthPresetOptions` to enable showing a dropdown with width presets.
-   Add `resizeHeightPresetOptions` to enable showing a dropdown with height presets.
-   Add `resizeWillRenderFooter` to enable customization of the resize plugin footer components.
-   Add `cropWillRenderTools` to enable customization of the crop plugin toolbar.
-   Fix TypeScript declarations for frame plugin properties and `imageFrame` property.

## 8.8.2 | 2021-09-14

-   Fix issue with FilePond preset not showing edit button.

## 8.8.1 | 2021-09-13

-   Add `shapePreprocessor` property to preset code.
-   Fix `shapePreprocessor` and `createDefaultShapePreprocessor` missing from TypeScript declarations file.
-   Fix Uppy integration so works with Uppy version 2.
-   Fix issue where eraser would erase text shapes that weren't near the eraser location.
-   Fix issue where eraser would erase all shapes instead of only lines and sharpie.
-   Fix issue where sharpe angles in sharpie line would result in very spiky lines.
-   Improve rendering of text input modal, now moves to top if softkeyboard detected and not editing in a modal.

## 8.8.0 | 2021-09-08

-   Improved preset examples to make use of default editor.
-   Add `willClose` hook fires when user attempts to close the editor when it's running in a modal.
-   Fix issue with DataURLs not working in version 8.7.0.
-   Fix issue where `imageCropMinSize` didn't throw error on image load when image was smaller than defined min size.
-   Fix issue with rotation controls when a minimum crop size was supplied, `imageCropLimitToImage` was set to `false`, and the loaded image was smaller than the minimum size.

## 8.7.0 | 2021-09-07

Please note that if you're _not_ using `getEditorDefaults`, `appendDefaultEditor`, `openDefaultEditor`, `overlayDefaultEditor`, or `defineDefaultCustomElements` to create the editor, you need to set the `shapePreprocessor` property after this update. See the editor properties documentation for more details.

-   Add `shapePreprocessor` property, needs to be set when using `lineEnd`, `lineStart`, or `frameStyle` property on shapes.
-   Add `createDefaultShapePreprocessor`, use to set the `shapePreprocessor` property to the default `lineEnd`, `lineStart`, and `frameStyle` processors.
-   Add opacity slider to stickers.
-   Add `'force'` mode to shape `backgroundSize` which changes the background image to fit the shape size.
-   Add support for updating the `backgroundImage` source, this enables for example cropping of stickers.
-   Add `pathClose` prop to path shapes for drawing exotic paths.
-   Add slight shadow on the inside of the image outline for better visual distinction between crop and image.
-   Add `enableSelectToolToAddShape`, set to `true` to add shape when a markup tool is tapped, defaults to `false`.
-   Add `enableTapToAddText`, set to `true` to add inline text shape when clicking canvas, defaults to `false`.
-   Add undo/redo keyboard shortcuts.
-   Add autoselection of text in text input form when input form shows.
-   Add support for `inverted` property to rectangle shape to enable drawing rounded rectangle overlay in `willRenderCanvas`.
-   Add `postprocessImageBlob` to enable converting the output image file to a different format, for example a GIF or HEIC.
-   Improve rendering of image outline, lowered opacity of outline on all but crop util for improved preview of resulting image.
-   Improve rendering of decoration shapes, are no longer drawn outside of crop selection.
-   Improve render quality of shape manipulator outline.
-   Improve path draw quality.
-   Improved sticker size calculation logic.
-   Improve sticker shape aspect ratio, no longer forces the aspect ratio but sets `backgroundSize` to `'contain'` instead.
-   Fix stroke on square not being correctly rendered on inside.
-   Fix `'circle-solid'` line end shape distance to line.
-   Fix problem with `cropLimitToImage` and rotation on load.
-   Fix problem with white color in color picker being nearly invisible.
-   Fix issue with hidden canvas elements used for gradient overlay staying in DOM.

## 8.6.1 | 2021-09-06

-   Fix issue where sticker plugin would reposition preview image while being inactive.

## 8.6.0 | 2021-09-02

-   Add `imageEditorSupportImage` hook to FilePond plugin imag editor to filter out unsupported images.
-   Fix issue where sharpie would be active in markup editor even if not included in toolbar.
-   Fix issue where a tool was always selected in the markup editor.
-   Fix issue where removing last shape from markup editor would sometimes trigger error.
-   Fix issue where setting active tool would no longer work after user changed tool.

## 8.5.9 | 2021-09-01

-   Fix issue with Uppy editor plugin trying to open remote files.
-   Fix issue with `cropMaxSize` being set too low because of incorrect browser detection.

## 8.5.8 | 2021-08-31

-   Fix issue with `isSelected` and `isEditing` not working when setting shapes in `'load'` event or when assigning initial shapes along with editor options. These props are now also included in the `imageState`.
-   Fix issue with TypeScript declarations not having `willRenderShapePresetToolbar` property.
-   Fix issue with TypeScript declarations shape `isEditing` property being readonly.

## 8.5.7 | 2021-08-19

-   Fix issue where dropping a file on `<pintura-input>` wouldn't work.
-   Fix issue where listening for pintura events would not work on `<pintura-input>`.
-   Fix issue where passing a single locale property to a default editor would prevent the editor from loading.

## 8.5.6 | 2021-08-16

-   Fix issue where drop and paste file was not working for file objects.

## 8.5.5 | 2021-08-13

-   Fix obscure ellipse drawing bug.

## 8.5.4 | 2021-08-09

-   Fix issue with clarity input not being applied in preview.

## 8.5.3 | 2021-08-04

-   Fix issue with center button not working since last update.

## 8.5.2 | 2021-08-02

-   Fix issue where resizing the window would reset crop state in overlay mode.
-   Fix issue where scrolling the window would reset crop state in overlay mode.
-   Fix `cropEnableZoomAutoHide` missing from TypeScript declarations file.

## 8.5.1 | 2021-07-30

-   Improve handling of dropped resources, can now drop image URLs as well.
-   Fix `index` property missing from history in TypeScript declarations file.

## 8.5.0 | 2021-07-28

-   Add `cropEnableZoomAutoHide`, set to `false` to prevent auto hiding of crop zoom control on compact displays.
-   Improve rendering of rotation control in overlay mode by making it more compact.
-   Fix issue where toolbar was hidden when in overlay mode.
-   Fix issue with dropdown icon button having too much padding.
-   Fix issue with error thrown when `cropSelectPresetOptions` dropdown had no `undefined` custom crop mode.

## 8.4.1 | 2021-07-27

-   Fix issue with overlay mode editor showing a black screen on some devices.
-   Fix issue with overlay not setting initial history state correctly.
-   Fix issue with `abortProcessImage()` not working when called directly after `'processstart'` was fired.
-   Fix issue with `abortLoadImage()` not working when called directly after `'loadstart'` was fired.
-   Add `willProcessImage` to enable better interception of a process image request from the interface.

## 8.4.0 | 2021-07-26

-   Fix setting incorrect initial crop when loading an image with `cropLimitToImage` set to `false` and applying an initial rotation.
-   Fix issue with reading EXIF orientation from certain JPEG files.
-   Improve history state, now adds initial base state when setting initial props.
-   Improve `processImage` method to accept properties just like the `loadImage` method.
-   Add `willSetHistoryInitialState` to allow intercepting initial history state and override it.
-   Add `processDefaultImage`, a helper function for headless image processing with less configuration options.
-   Add `'update'` event which is fired every time the `imageState` object is updated.

## 8.3.1 | 2021-07-21

-   Fix modal example in jQuery preset.

## 8.3.0 | 2021-07-16

-   Add `disabled` property, will disable any interactions with the editor.
-   Add `status` property, set to string or array `[label, progressType]` to show a custom status message.
-   Add `preprocessImageSource` to the `createDefaultImageWriter()` to allow preprocessing the image source used to create the output image.
-   Add `updateImage` to update the image source file while retaining the history state.
-   Add `updateImagePreview` to update the current image preview.
-   Add `imageMetadata` property, enables storing custom metadata in the `imageState` object.
-   Improve image intro animation.
-   Improve default style of custom buttons in editor toolbar.
-   Improve rendering of path and shape stroke.

## 8.2.0 | 2021-07-12

-   Add `enablePasteImage` property, allows pasting an image to the browser window, the editor will pick it up if it's at least 75% in view.
-   Fix scrolling the page when interacting with editor on iOS 12 and older.

## 8.1.1 | 2021-07-09

-   Fix sharpie lines being closed when erasing so eraser would erase sharpie line between end and begin point.
-   Fix error thrown when dragging two sides of the crop rect.
-   Fix error thrown when rotating and dragging image at the same time and ending the rotation interaction.
-   Fix multi-touch zoom scaling too fast.

## 8.1.0 | 2021-07-08

-   Add switch text layout button to switch between fixed text box, auto-height, or auto-width.
-   Add `disableTextLayout` property, set to `true` to disable switching to other text layouts or set to array of disabled layout values.
-   Add support for `textContent` property to node list.
-   Add NodeTree helpers to TypeScript declarations.
-   Improve `createNode` to allow calling it with three arguments instead of requiring four.
-   Fix typo in `Color` property of shape in TypeScript declarations.
-   Fix issue where shape flip horizontal icon had black fill.
-   Fix issue where padding of text input box was drawn incorrectly.
-   Fix issue where resizing flipped shapes moved all shape corners.
-   Fix issue where editing flipped text shapes didn't position the shape correctly.

## 8.0.3 | 2021-07-05

-   Fix new text being flipped in annotation util if image was flipped.
-   Fix issue where resizing the window would incorrectly update shape selection indicator.
-   Fix positioning issue with text shape when image was flipped and user was inputting text.
-   Fix adding stickers at same center position not being placed at random offset from center.
-   Fix bug where on Safari adding a sticker would not center it to the viewport.
-   Improve interaction in stickers view, click on sticker now allows immidiate dragging.
-   Improve Angular component peer dependencies to include Angular 12.

## 8.0.2 | 2021-06-28

-   Fix issue where vignette was drawn on top of annotations in preview.
-   Fix `color` and `strokeColor` being marked as mandatory in the TypeScript declarations.
-   Fix line style square outline indicator being represented by an arrow.
-   Fix issue with the editor not correctly orientating images when image had more than one orientation tag.
-   Fix issue where clicking outside of the text input panel would throw an error.
-   Fix issue with vue inline component not rendering correctly.

## 8.0.1 | 2021-06-23

-   Fix issue with `<pintura-input>` opening multiple editor instances.
-   Fix issue with `<pintura-input>` not using `name` attribute for asynchronous uploads.

## 8.0.0 | 2021-06-21

Rebrand to Pintura. This name change introduces breaking changes and therefor the major verion number has been increased to 8. Properties that had been deprecated in version 7 have also been removed. A migration guide has been added to the product site.

-   Change `<doka-image-editor>` custom element to `<pintura-editor>`.
-   Change `<image-input>` to `<pintura-input>`
-   Change `.doka-image-editor` CSS class to `.pintura-editor`.
-   Change `'doka:<event>'` to `'pintura:<event>'`.
-   Remove `doka-` internal id prefixes.
-   Remove use of the term "doka" by replacing it with "pintura".
-   Improve Cordova backup script, it now stores backup WebAPI in `__pqina_webapi__`.
-   Remove method `undo()`, use `history.undo()` instead.
-   Remove method `redo()`, use `history.redo()` instead.
-   Remove method `revert()`, use `history.revert()` instead.
-   Remove export `imageOrienter`, use `createDefaultImageOrienter`.
-   Remove export `plugin_annotate_defaults`, use `markup_editor_defaults` instead.
-   Remove export `plugin_decorate_defaults`, use `markup_editor_defaults` instead.
-   Remove export `component_shape_editor_locale_en_gb`, use
    `markup_editor_locale_en_gb`
-   Remove export `plugin_crop_defaults`, set `cropSelectPresetOptions` manually instead, see crop plugins docs.
-   Remove export `plugin_resize_defaults`, this was an empty object, no replacement necessary.
-   Remove export `plugin_sticker_defaults`, this was an empty object, no replacement necessary.

## 7.18.3 | 2021-06-20

-   Add detection for missing mimetype in DataURLs.

## 7.18.2 | 2021-06-17

-   Fix issue with font test not building a valid querySelector.

## 7.18.1 | 2021-06-15

-   Fix issue with `document.fonts.check` reporting `false` for custom fonts. Code now also checks if the `check` API is properly supported by the browser.

## 7.18.0 | 2021-06-14

-   Add `willRenderPresetToolbar` hook to enable rendering custom preset toolbar items next to stickers overview. By default toolbar renders "Select image" button.
-   Add `format` property to `createDefaultImageWriter`, enables choosing the `dest` type. Set to `'file'`, `'imageData'`, or `'canvas'`.
-   Add support for ellipse shape in stickers.
-   Add CSS custom properties to style modal.
-   Improve "select image" icon.
-   Improve draw quality of resized stickers.
-   Improve setting of `class` property when using `openEditor`, the `class` property is now set to the editor modal instead of the editor itself.
-   Improve handling of custom node tree structures, can now define components with name. Currently supports `'Button'` or `'Dropdown'`.
-   Improve handling of Escape key when in modal, now only closes the top modal not all modals.
-   Improve `react-doka` TypeScript types.
-   Improve node tree api, `appendNode` now adds a node to a target node or nodelist, no longer accepts `id` parameter.
-   Fix issue where getting editor UI props would not work.

## 7.17.1 | 2021-06-11

-   Fix `backgroundImage` not working correctly on ellipse shape.
-   Fix `react-doka` TypeScript types mismatch.

## 7.17.0 | 2021-06-09

-   Add `history.write(state?)` to push a new state on the history array or create a new history entry based on the current state.
-   Add `history.get()` to retrieve all history entries.
-   Add `history.set(entries?)` to set the history array, combined with `history.get()` this allows complete restore of a previous image editing session.
-   Add guard against interaction problem on Chrome mobile.

## 7.16.0 | 2021-06-04

-   Improve visibility of annotation selection tool by increasing the selection outline width and adding a slight shadow. This makes interacting with annotations on bright backgrounds easier.
-   Fix issue where default font setting wouldn't render font.
-   Fix problem where selecting lines wouldn't work correctly.
-   Text tool now adds "auto" text field when tapping vs. text box when dragging to create a field.

## 7.15.1 | 2021-06-03

-   Fix newly introduced properties missing from TypeScript definitions.
-   Fix changing outline color not triggering redraw of interface.

## 7.15.0 | 2021-06-01

-   Add `layoutDirectionPreference` property to force `'horizontal'` or `'vertical'` layout for normal display size. Will revert back to 'auto' for very small display sizes.
-   Add `imageEditorAfterWriteImage` property to FilePond Image Editor plugin, enables generating more than one output image, additionally uploading the original source image, and/or renaming the output file.
-   Improve registering of custom elements for `<doka-image-editor>` and `<image-input>` now checks if custom elements were already defined.
-   Fix issue where zooming the browser window would draw interface and decoration shapes at incorrect positions until browser window was refreshed.
-   Fix issue where filter preview images weren't fading out on exit filter util.
-   Fix issue where toggling utils on and off would incorrectly redraw view.
-   Fix issue where filter previews would stick around when filter util was disabled after being enabled earlier.

## 7.14.2 | 2021-05-28

-   Fix further issues where depending on how the editor modal was implemented on React it would throw an error when closing the editor.
-   Fix issue with `<image-input>` where could not exit "waiting for image" state.
-   Fix issue where cordova `www` folder was missing from preset package.
-   Fix issue with image load error not being caught.

## 7.14.1 | 2021-05-27

-   Fix issue where crop selection line color would sometimes not have correct color.
-   Fix issue where depending on how the editor modal was implemented on React it would throw an error when closing the editor.
-   Fix issue with new annotations being rotated incorrectly if the image was flipped.
-   Fix issue with `<image-input>` not working on Safari
-   Fix issue with `<image-input>` edit button not working for dropped images.
-   Fix issue with `<image-input>` not rendering properly when image input script was embedded before element.

## 7.14.0 | 2021-05-26

-   Add `eraseRadius` shape style to erase tool definition, shapes in the given radius around the erase interaction will be removed, defaults to `0`.
-   Add `markupEditorToolSelectRadius` property to markup editor component, shapes inside the given radius will be eligible for selection, defaults to `0`.
-   Improve shape selection logic, now takes into account shape `strokeWidth`.
-   Fix issue with auto text not rendering.

## 7.13.0 | 2021-05-25

-   Improve missing doctype warning to make it more descriptive.
-   Fix bug where `<image-input>` component would not accept globally defined `imageWriter` props.
-   Add templating to `<image-input>` component to allow customisation of the empty, load, and process state.

## 7.12.2 | 2021-05-21

-   Fix issue where placing too many stickers would exceed maximum WebGL active texture capacity and throw an error.
-   Fix sticker list being too narrow.
-   For default factories stickers will stick to image instead of crop context by default.

## 7.12.1 | 2021-05-20

-   Fix line and foreground color missing from `willRenderCanvas` call.
-   Fix TypeScript declarations for default factory functions, would still require `locale` and `imageReader` properties.
-   Update `<image-input>` component to use `openDefaultEditor` factory function instead of `openEditor`.

## 7.12.0 | 2021-05-19

-   Add automatic software rendering detection. Browsers will switch to software rendering if the graphics card has been black listed by the browser vendor. This can happen if the video card drivers are outdated or if the graphics chip is too old and doesn't support the proper draw commands. If the browser is detected to be running in software rendering mode the editor will automatically lower its framerate to 20, will disable animations if the `animations` property is not set to `'always'`, and will disable the finetune util clarity range input. This should lower the strain on the users system and allow for a less optimal but still suitable image editing experience.
-   Add `'loadabort'` event when clicking the dismiss load error button.
-   Improve rendering performance by limiting interaction updates to one per frame.
-   Fix issue where `overlayEditor` would not render in portrait aspect ratio.
-   Fix issue with annotations not rendering correctly when texture size is limited.
-   Fix issue where loading incorrect plugins would throw error.
-   Fix issue where crop dropdown values were added to the default editor factories.
-   Fix issue with convolution matrix always being applied to preview render output.

## 7.11.1 | 2021-05-17

-   Fix issue where passing options to `defineCustomElements` did not set them on created editors.

## 7.11.0 | 2021-05-14

-   Fix issue with ESC key press not triggering `'close'` event.
-   Fix issue where `appendEditor` would throw if no target element supplied.
-   Fix further issues with image orientation on iOS.
-   Add `appendDefaultEditor`, `appendDefaultEditors`, `openDefaultEditor`, `overlayDefaultEditor`, `defineDefaultCustomElements`, and `getEditorDefaults` exports, these editor factories will create a default editor with all plugins enabled, default options set, and locale loaded, they won't require any customisation before use.

## 7.10.6 | 2021-05-12

-   Fix issue where iOS versions 13 and earlier would reload page after loading a photo from camera.
-   Fix `index` getter missing editor history API.

## 7.10.5 | 2021-05-11

-   Fix issue with image exif orientation not being corrected on Safari 12 and below.
-   Fix issue with `canvasMemoryLimit` being incorrectly applied on Chrome.
-   Fix issue with decoration text box not being scaled correctly.

## 7.10.4 | 2021-05-05

-   Fix max canvas sizes being too large resulting in errors when zooming out when `imageCropLimitToImage` was set to `false`.
-   Add FilePond example to Svelte preset.
-   Improve FilePond Plugin Image Editor to remove the edit button if WebGL is disabled in the browser.
-   Improve FilePond Plugin Image Editor to still auto-process images if editing is disabled by lack of WebGL support.

## 7.10.3 | 2021-05-04

-   Fix some Emoji showing as symbols instead of emoji.
-   Fix overflow of active item in dropdown list when list panel has border radius.
-   Remove some animations that still played when `animations` was set to 'never'.
-   Add `supportsWebGL` helper to exports.

## 7.10.2 | 2021-05-03

-   Improve handling of invalid or missing image mimetypes when loading images from URL resources.
-   Fix issue where text input modal would throw error in responsive design mode.
-   Fix issue with line processing introduced in 7.10.1.

## 7.10.1 | 2021-04-29

-   Improve handling of horizontal touchpad on Firefox.
-   Improve parsing of legacy data.
-   Improve accessibility of tabs and interactive controls.
-   Mark touchstart and mousewheel event listeners as non-passive to prevent Lighthouse warning.
-   Optimize SVG icons to use less elements.
-   Optimize range input to use single path element instead of circle element for each dot.
-   Optimize rendering of utils, will now wait with rendering util elements until util becomes active for first time.
-   Fix issue with loading new image after annotating crashing the editor.
-   Fix issue where line util would show arrow controls and would inherit arrow styles.

## 7.10.0 | 2021-04-26

-   Improve alignment of text in crop toolbar buttons for Firefox and Safari.
-   Support image zoom gesture with MacBook trackpad.
-   `cropImageSelectionCornerStyle` can now take `"invisible"` as value hiding the crop corner controls.
-   `cropWillRenderImageSelectionGuides` can be used to finetune image selection guide count and appearance.
-   Now renders additional image selection guides while rotating image.
-   Move image selection guide rendering logic to crop plugin.
-   Deprecate `undo()`, `redo()`, and `revert()` method and move to `history.undo()`, `history.redo()`, and `history.revort()`.
-   Add `history.length` property to access current history length.
-   Fix issue with MacBook trackpad horizontal swipe not being smooth.
-   Fix issue with revert api not working.
-   Fix issue where new lines and arrows weren't recorded in history update.

## 7.9.1 | 2021-04-23

-   Fix problem with IME keyboard blocking use dropdown after text input.

## 7.9.0 | 2021-04-20

-   Add visual resizing of image preview to resize plugin.
-   Add `cropIconSelectPreset` icon property to crop plugin locale object.
-   Add `cropIconCropBoundary` icon property to crop plugin locale object.
-   Improve visual queue for auto calculated values of resize input fields, now has dashed outline if auto calculated.

## 7.8.1 | 2021-04-19

-   Fix issue with crop corners not aligning with image when `enableUtils` set to `false`.
-   Fix issue with spacing of crop plugin tools when main toolbar disabled.
-   Fix issue with renderer throwing an error when using remote images for stickers.
-   Fix missing TypeScript definition for setting sticker groups.
-   Add `--preview-border-color` custom property for changing preview border color.
-   Add preset for Ionic 3 Angular.

## 7.8.0 | 2021-04-12

-   Add `cropEnableRotateMatchImageAspectRatio` option, if set to `'always'` this will automatically rotate the crop rectangle with the image. The editor only does this if the image is rotated while fully zoomed out and the crop aspect ratio is set to custom or a rotated crop aspect ratio preset is available. Set to `'custom'` to only do this when in custom aspect ratio mode. For backwards compatibility reasons the default is `'never'`.
-   Improve handling of turning images. Now auto scales crop to fit image if crop was centered and at max size within image bounds.
-   Improve handling of crop aspect ratio changes with rotated image. Now auto resizes new crop to fit image bounds.
-   Improve exported default crop aspect ratio options, now features 4:3 and 3:4 aspect ratios.
-   Fix issue with annotate and decorate toolbar items not being displayed since version 7.7.0.
-   Fix issue with zoom control not working correctly.
-   Fix issue with reset button of zoom control still resetting to 0 when zoom range was limited.
-   Fix issue with rotation and zooming out not always working correctly when `imageCropLimitToImage` was set to `false`.

## 7.7.2 | 2021-04-09

-   Fix issue with rotating while crop not being centered causing crop to zoom in too far.

## 7.7.1 | 2021-04-08

-   Fix issue with stickers on Angular 7.
-   Add Nuxt.js example project.

## 7.7.0 | 2021-04-06

-   Add `beforeUpdateShape` which enables preventing or altering shape updates.
-   Add individual filter exports for fine grain control over which filters are available. See documentation exports section for more details.
-   Add individual finetune control exports for fine grain control over which color adjustment controls are available. See documentation exports section for more details.
-   Add individual shape control exports to make customisation and configuration of the markup editor less verbose. See markup section in documentation for more details.
-   Add helper methods to make customisation of markup editor easier.
-   Add support for `width` only text shapes. Height is automatically calculated.
-   Improve text shape selection, now tests against visual text shape instead of entire text box.
-   Improve style of the text input box scrollbar.
-   Improve handling of pasting text in the text input box.
-   Improve TypeScript declarations file.
-   Improve rendering of line end style shapes.
-   Fix issue with auto repositioning of full size stickers.
-   Fix issue with full size stickers not being scaled correctly.
-   Fix issue with shape `opacity` property not applying opacity to textures.
-   Fix issue with rotated text shapes causing a slight text misalignment.
-   Fix issue with rotation inertia not being 100% smooth since 7.6.0.
-   Fix issue with loading images smaller than minimum crop size. Now shows error message stating minimum image width and height.
-   Fix issue with FilePond Image Editor plugin generating output image twice. Requires updating FilePond to 4.26.2.
-   Fix issue with FilePond Image Editor plugin triggering re-upload of server image. Requires updating FilePond to 4.26.2.
-   Removed unused image properties `noise` and `perspective` from `imageState` object.
-   Deprecated default exports for `plugin_resize_defaults`, `plugin_sticker_defaults`, `plugin_annotate_defaults`, `plugin_decorate_defaults`, and `component_shape_editor_locale_en_gb`.

## 7.6.0 | 2021-03-26

-   Align preset templates with product page demo by loading annotate plugin instead of decorate plugin.
-   Add sticker example code to the native and jquery preset templates.
-   Add configuration properties to `store` property of `createDefaultImageWriter`.
-   Add `image-input` custom element, it automatically creates file input elements with edit, sync, and async upload functionality.
-   Fix issue with "react-doka" TypeScript declaration file.
-   Fix issue with bottom padding for overlay rotation control being too big.
-   Fix issue with float values in resize plugin width / height placeholders.
-   Fix issue with rotate button double turning an image when one turn would be possible.
-   Fix issue with zoom control showing `NaN` if min crop size was same as image size.

## 7.5.5 | 2021-03-22

-   Fix FilePond Image Editor plugin TypeScript declaration file.
-   Fix React and Vue FilePond presets.
-   Fix missing locale labels in locale folder.

## 7.5.4 | 2021-03-19

-   Fix issue where crop controls weren't centered when only one util plugin was active.
-   Fix issue with editor border line looking a bit odd when not centered.

## 7.5.3 | 2021-03-18

-   Fix issue where converting a JPEG to a PNG would result in an invalid image.
-   Fix issue with stickers button showing in annotate and/or decorate plugin even though no sticker presets were defined.
-   Fix issue with canvas memory limit not being respected on browsers that support OffscreenCanvas.
-   Fix issue with editing a set of files in Uppy.
-   Fix issue where undefined value for `filter` resulted in an error when processing the image.
-   Fix issues with TypeScript definitions not matching API.
-   Fix issue with `resizeMinSize` and `resizeMaxSize` not being applied correctly when switching between size fields.

## 7.5.2 | 2021-03-16

-   Fix issue where processing a PNG would throw an error.

## 7.5.1 | 2021-03-15

-   Fix issue with `resizeMinSize` and `resizeMaxSize` being applied too soon.
-   Fix issue with navigation bar overlapping revert button.

## 7.5.0 | 2021-03-14

-   Add color temperature control to finetune plugin.
-   Add better range indicators to sliders, now range from -100 to 100.
-   Add shape `fontStyle` property, set to `'italic'` to render italic font.
-   Add shape `fontWeight` property, set to `'bold'` to render bold font.
-   Add shape style control to switch between font weights and styles simultaneously.
-   Add center indicator to range input.
-   Add drop image on top of editor to load new image, toggle with `enableDropImage`, is disabled by default.
-   Add test for Document Type Declaration before starting the editor.
-   Add `enableButtonClose` to editor base UI, set to `true` to enable close button, is automatically set to `true` when using `openModal`.
-   Add `close` public method to base UI, triggers 'close' event.
-   Add experimental `willRenderNav` hook which allows manipulation of the main navigation toolbar.
-   Improve rendering of shape style controls, now animated.
-   Improve positioning of shape controls, now limited to stage.
-   Improve rendering of disabled buttons, now show default "arrow" cursor instead of "hand".
-   Fix `strokeWidth` being updated incorrectly when color was changed.
-   Fix issue with internal events not being correctly removed.
-   Fix issue with `NaN` value in resize util.
-   Fix issue with shape style control appearing underneath shape manipulator corners.
-   Fix issue with filter previews not rendering.
-   Fix issue where JPEG image header wasn't copied over to output image.
-   Rename preset `lib` folder to `local_modules`.

## 7.4.4 | 2021-03-05

-   Fix text missing from output.
-   Fix coloring of text shapes without width.

## 7.4.3 | 2021-03-04

-   Fix center alignment of single row stickers.
-   Fix internal shape props being outputted in imageState.
-   Fix error when processing generating output data for Blob input.
-   Reset scroll position in sticker groups when switching between groups.
-   Improve Cordova preset with camera and photo library selection.

## 7.4.2 | 2021-03-01

-   Fix missing calls to `handleEvent` when using `openEditor`.
-   Fix editor not firing progress events.

## 7.4.1 | 2021-02-26

-   Fix problem with iOS crashing while generating preview of big image.
-   Fix problem with `calc()` statements missing parentheses.
-   Fix issue with Server Side Rendering.
-   Fix issue with Next.js production build.
-   Fix issue with FilePond Image Editor plugin not removing file when closing editor.
-   Fix problem with arrow styles not rendering correctly in preview.
-   Fix missing vertical flip icon in shape controls.
-   Add Cordova preset template.
-   Add locale folder to package.
-   Improve load speed of images in FilePond image editor plugin.
-   Optimize package size.

## 7.4.0 | 2021-02-23

-   Add shape manipulation events that were available in v6 see Shape and Event docs for more information.
-   Add sticker thumbnail hook.
-   Add sticker `disabled` state option.
-   Add sticker group `disabled`, `icon`, and `hideLabel` options.
-   Add tabs for sticker groups.
-   Add tool `disabled` state option.
-   Add missing feature error message.
-   Add `preprocessImageState` hook to `createDefaultImageWriter`.
-   Fix text color also coloring Emoji.
-   Fix double tapping text input not showing keyboard to edit text on iOS and Android.
-   Fix line end square not being drawn.
-   Fix line end output being slightly different from preview.
-   Fix PostCSS error recognizing calc statements as require parsing.

## 7.3.0 | 2021-02-17

-   Improve cleaning up editor on window unload.
-   Improve how modal controls affect editor height on iOS.
-   Prevent virtual keyboard from resizing window view when using `openEditor`.
-   Improve text input control interface on iOS and Android.
-   Add live preview when editing text.
-   Fix problem with text input on Android and iOS.
-   Fix uncaught error when an image could not be loaded.

## 7.2.2 | 2021-02-12

-   Improve Vue2 components so attribute updates are caught correctly.
-   Improve crop rectangle size calculations when switching between aspect ratios.
-   Improve Next.js project set up to use CSS modules.
-   Improve rendering of shape selection when switching view while a shape is selected.
-   Add press escape key to close Image Editor modal.
-   Add `stickerEnableSelectImage` prop to enable / disable custom sticker selection.
-   Add FilePond implementation example to Vue 3 preset.
-   Add FilePond implementation example to React and React TypeScript presets.
-   Add CSS Modules doka.module.css file for use with Next.js.
-   Fix issue where loading a new image would crash the editor.
-   Fix crop rectangle not animating after using scroll wheel to zoom out when already zoomed out.
-   Fix rotator anchor rendering in the wrong position when holding shift.
-   Fix line snapping in the wrong direction when holding shift.

## 7.2.1 | 2021-02-08

-   Fix issue with drawing rectangles in annotation view on normal displays.
-   Fix issue where text color could was always black.
-   Fix issue where outline for rectangles wasn't being drawn.
-   Fix problem with events not being fired correctly in Vue v2 components.
-   Fix issue on Vue where assigning of initial props caused settings to be applied incorrectly.
-   Fix problem with annotation stickers placed incorrectly on rotated image.
-   Fix load event firing twice when loading images shortly after each other.
-   Fix PNG aliased transparent pixels.
-   Add `postprocessImageData` hook to `createDefaultImageWriter`.

## 7.2.0 | 2021-02-04

-   Add line snapping, hold shift to draw straight lines or to draw lines at a 45 degree angle.
-   Add Vue 2 example project and components.
-   Optimize vertical space use on iOS Safari.
-   Optimize creation and memory usage of canvas elements.
-   Optimize interaction with hitboxes small shapes.
-   Fix `imageCrop` incorrectly applied when cropLimitToBounds was set to `false`.
-   Fix annotations being drawn outside the image bounds on the output image.
-   Fix imageBackgroundColor not being applied to pixels outside of imageData.
-   Fix problem where buttons in shape popup menu could not be clicked when under top nav bar.
-   Fix issue with opening browser dev tools and the keydown state not being released.
-   Fix contextmenu causing events to be attached incorrectly.
-   Fix filter being applied to image background fill.
-   Fix blending of image effects with image data being slightly incorrect.
-   Restructured Angular and Vue packages and preset folders.

## 7.1.0 | 2021-01-29

-   Fix issue with tiny gaps in sharpie lines on Safari.
-   Fix `cornerRadius` not applied to rectangle in output image.
-   Fix preview rendering of rectangles that had `cornerRadius`, `backgroundSize`, and `backgroundImage` applied.
-   Fix `cornerRadius` overlapping if larger than half rectangle width.
-   Dramatically improve text preview update speed when changing text color.
-   Lower compressed package size by 2KB by optimising GLSL shaders.
-   Optimise draw performance of rectangles and text shapes.
-   Fix Angular minimum required version being 11.
-   Fix issue with SSR and how the `<doka-image-editor>` was defined.
-   Fix `imageBackgroundColor` not being applied in preview and output.
-   Improve render quality of colors in color picker buttons.
-   Add auto setting of shape `strokeWidth` if `strokeColor` is changed in editor.
-   Add Next.js preset project.
-   Add Angular View Engine preset project for Angular versions 8 and lower.

## 7.0.2 | 2021-01-25

-   Fix negative clarity value not blurring output image.
-   Fix problem with restoring annotation/decoration state with text shapes and image shapes.
-   Fix rotated text not rendering.
-   Fix problem with backgroundSize 'cover' and 'contain' not rendering correctly.
-   Fix performance of multiline text resizing.
-   Fix clipping of multiline text in output image.
-   Fix handling of returns in auto text blocks.
-   Fix not being removable with eraser tool.
-   Fix clarity image preview showing black or white lines on iOS and M1.
-   Fix drag dropping stickers not working on mobile.

## 7.0.1 | 2021-01-22

-   Fix dragging and dropping stickers only working in annotation mode.
-   Fix image stickers not showing correctly.
-   Fix drawing emoji stickers not working sometimes.
-   Fix stickers being added while dragging over sticker thumbnail.
-   Fix stickers not being rotated rotated correctly when adding to a rotated image.
-   Fix clarity adjustments resulting in a black image.
-   Fix sticker presets `width` and `height` not being picked up correctly.
-   Fix circular shapes being incorrectly drawn on iOS.
-   Fix solid arrows not being drawn to output image.
-   Fix solid arrows not being drawn correctly on retina viewports.
-   Fix arrow tool missing arrow icon.
-   Fix stickers not being loaded correctly on Safari.
-   Fix automatic font-stack filtering for font family dropdown.
-   Fix Firefox navigating to previous page when trying to remove a shape with backspace key.
-   Fix decoration and annotation scale being incorrect when setting `imageTargetSize` property.
-   Fix menu buttons sometimes not responding to click.
-   Fix problem with free drawing circles because of incorrect tap gestured detection.
-   Fix android dragging of scrollable regions not working smoothly.
-   Lowered default size for sharpie and text.
-   Add `createDefaultImageOrienter`, use instead of `imageOrienter`.
-   Improve scroll container performance.
-   Removed preset util defaults from annotate and decorate tools.

## 7.0.0 | 2021-01-15

Version 7 is a complete rewrite of the image editor. The look and feel is different and it is not backwards compatible. You can convert version 6 data to a version 7 compatible format using the `legacyDataToImageState` method exported by the image editor module.

See below for a short overview of some of the new features and improvements.

-   Add landscape view to make better use of viewport space
-   Add improved viewport resizing
-   Add undo/redo and reset functionality
-   Add shape drawing API for drawing custom elements on top of the preview
-   Add zoom control
-   Add new render engine
-   Add vignette control for adding a retro look n' feel
-   Add gamma control for gamma correction
-   Add clarity control for slightly sharpening and blurring images
-   Add Custom Element
-   Add support for tree-shaking
-   Add drag/drop of stickers
-   Add uploading of custom stickers
-   Add rotating of shapes
-   Add z-ordering of shapes
-   Add duplicating shapes
-   Add various arrow end styles
-   Add text wrapping
-   Add improved color selection
-   Add image annotation
-   Add more filters
-   Add stickers to draw utils
-   Add separate sticker util
-   Add headless processing of images
-   Add improved FilePond integration plugin
-   Add improved Dropzone integration plugin
-   Add improved Uppy integration plugin
-   Add improved jQuery, React, Angular, Svelte, and Vue adapters
-   Fix issue with text not rendering correctly.
-   Fix position of text input box that wasn't centered.
-   Fix issue where reset or undo would restore beyond initial imageState.
-   Fix issue where loading a new image would not work.

## 6.20.0 | 2020-12-21

-   Add gold version of version 7.0, this version is ready for public use

## 6.19.0 | 2020-12-09

-   Add second beta version of version 7.0
-   Add `beforeDeselectMarkup(currentItem, nextItem)` which is called when A markup item is deselected, return `false` to prevent deselection, return `true` to allow deselection.

## 6.18.0 | 2020-11-19

-   Add first beta version of version 7.0
-   Add `afterUpdateStickerItem(button, data)` which is called when the editor updates the sticker thumbnail. Allows updating the sticker thumbnail HTML.
-   Add `beforeAddMarkup(markupItem)` hook which is called before a markup item is added, return `markupItem` or `false` to prevent adding the item.
-   Add `beforeRemoveMarkup(markupItem)` hook which is called before a markup item is removed, return `markupItem` to continue or `false` to prevent removing the item.
-   Add `onselectmarkup(markupItem)` callback which is called when a markup item has been selected.
-   Add `onremovemarkup(markupItem)` callback which is called when a markup item has been removed.
-   Add `onaddmarkup(markupItem)` callback which is called when a markup item has been added.

## 6.17.0 | 2020-10-28

-   Add React-Dropzone integration example.

## 6.16.1 | 2020-10-26

-   Fix issue with `filter` property not being applied when set to string.
-   Fix issue where markup dropdowns would not select active styles.
-   Fix issue where narrow viewport menu was rendered incorrectly when only one util was active.
-   Fix issue where loading a new image wasn't possible after a previous image failed to load.
-   Fix issue where Firefox would sometimes throw an error when loading a Blob

## 6.16.0 | 2020-09-09

-   Add `beforeReset` hook to allow cancelling a reset.
-   Fix issue where the Dropzone adapter would throw an error if the editor rejected an image file.

## 6.15.5 | 2020-09-04

-   Fix issue where setting the `outputData` object as new options would not recreate previous state.

## 6.15.4 | 2020-08-21

-   Fix issue where clicks on filters or stickers would sometimes not register.

## 6.15.3 | 2020-08-12

-   Fix issue where clicking outside of a dropdown would throw an error.

## 6.15.2 | 2020-08-10

-   Fix issue with some buttons not working when testing on simulated iOS devices in Chrome DevTools.

## 6.15.1 | 2020-08-07

-   Fix issue where TypeScript definitions were missing in Angular package.

## 6.15.0 | 2020-07-29

-   Adjust hitboxes on markup resize controls so small items can be dragged more easily.
-   Hide edge resize controls on small symbols.

## 6.14.0 | 2020-07-27

-   Improve determining image mime type and file name of images loaded from URLs.
-   Fix issue where draw input could be enabled in sticker util view.
-   Upgrade Angular example project to version 10.

## 6.13.2 | 2020-06-25

-   Fix issue where elements with fixed values in sticker markup were not rendered correctly.

## 6.13.1 | 2020-06-22

-   Fix issue where markup images on remote servers would trigger tainted canvas error.

## 6.13.0 | 2020-06-16

-   Add prevent swipe on edge of screen navigation on iOS 13.4+.
-   Fix issue on IE11 where `contains` wasn't properly polyfilled.

## 6.12.0 | 2020-05-29

-   Add Sticker util. By default it's not enabled. Add `'sticker'` to the `util` property array to enable it.
-   Add `stickers` property. See documentation for details on how to set the available stickers.

## 6.11.0 | 2020-05-28

-   Add `beforeLoadImage` hook to allow custom file validation. Receives `file` object, should return a Promise. Resolve with `file` if everything is fine, reject with error status code if image should be rejected. Set `labelStatusLoadImageError` to a function to show a custom status message, the function receives the error status code and should return the label to show in the status bubble.
-   Fix issue with border color of markup elements that had a fill style.

## 6.10.1 | 2020-05-14

-   Fix issue in TypeScript definitions, `edit` method can resolve with `null`.
-   Fix issue on IE11 where menu/utils would not render after switching between them.
-   Fix issue with Angular example project not working on IE11 due to compiler problem.

## 6.10.0 | 2020-05-04

-   Update jQuery File Upload demo to use the `edit` functionality in the fileupload-ui library.

## 6.9.2 | 2020-05-01

-   Fix issue where image wasn't destroyed when loading a new image to an existing editor instance resulting in a memory leak. This could cause problems with rendering on iOS or errors related to a missing WebGL context.

## 6.9.1 | 2020-04-30

-   Fix issue with IE11 incorrectly loading DataURL strings.

## 6.9.0 | 2020-04-28

-   Add `onready` event which fires when a loaded image is first presented.
-   Fix issue where `size` property would override FilePond input size.

## 6.8.1 | 2020-04-23

-   Improve handling of custom markup, now assigns unique id to markup item if no id set.
-   Fix issue where server side rendering would throw an error.

## 6.8.0 | 2020-04-15

-   Add auto-detection of image-orientation functionality now present in iOS Safari 13.4 and Chrome 81, this prevents incorrect rotation of JPEG images that contain orientation EXIF info.
-   Add `disableDokaImageEditor` option to jQuery File Upload package.
-   Improve defensive CSS styles for SVG elements.

## 6.7.0 | 2020-03-30

-   Add `allowButtonReset`, set to `false` to disable the reset button.
-   Fix issue where `size` property would not work when 'resize' util wasn't active.
-   Improve defensive styles to prevent collisions with other style frameworks.

## 6.6.0 | 2020-03-23

-   Improve hitboxes of paths, lines and markup anchor points for easier handling on small viewports.

## 6.5.5 | 2020-03-21

-   Fix issue with error thrown while loading preview editor.

## 6.5.4 | 2020-03-19

-   Improve defensive styles to prevent collisions with other style frameworks.
-   Fix issue where setting the `crop` property would reset other properties.
-   Fix placement of new markup elements to prevent them falling outside of image bounds.

## 6.5.3 | 2020-02-28

-   Fix issue where accessing localStorage would throw an error if not available due to privacy restrictions.

## 6.5.2 | 2020-02-24

-   Fix issue where IE11 would throw an error when loading dataURIs.

## 6.5.1 | 2020-02-14

-   Fix issue where dragging and resizing was no longer working on webkit browsers after scrolling the view on a touch screen.
-   Fix issue where `outputCanvasSyncTarget` wouldn't render the correct image on retina viewports.
-   Fix issue introduced in version 6.5.0 where `setData` would reset the view.

## 6.5.0 | 2020-02-13

-   Add `outputCanvasSyncTarget` property, set to a canvas element to draw the current webgl view to the target canvas.
-   Fix issue where setting new markup would not correctly clear existing markup.
-   Fix issue where when the width of an inline editor was exactly 600 pixels the cancel and reset button would both be visible.

## 6.4.3 | 2020-02-04

-   Fix issue where Firefox 58 and earlier would freeze when generating a preview image.
-   Fix issue where `cropMask` wouldn't redraw when updated.

## 6.4.2 | 2020-01-30

-   Fix issue where a race condition could happen when focus was moved outside of the editor.
-   Fix issue where close button on processing status message would not show when rendering the editor inline.

## 6.4.1 | 2020-01-28

-   Fix issue where new filter logic would not be applied to filter previews and output image.

## 6.4.0 | 2020-01-27

-   Add `reject` handler to `afterCreateOutput`, hook can now be used to (for example) upload files and communicate the upload state to the user.
-   Fix issue where status bubbles were no longer animated.
-   Fix issue where filter color matrix would not correctly apply alpha values.

## 6.3.1 | 2020-01-17

-   Fix issue with response headers (when loading an image from URL) not being parsed correctly.

## 6.3.0 | 2020-01-14

If you're overriding default styles this update might impact rendering and you might have to prepend your custom styles with `.doka--root` to make them more specific.

-   Add `cropAllowResizeRect`. Set to `false` to disable resizing the crop rectangle. Useful for when you only want to allow users to scale and rotate the image.
-   Add markup clipping to prevent markup from being rendered outside of the image crop area (on modern browsers only).
-   Improve defensive styles to prevent collisions with overly generic style selectors.
-   Improve profile examples to include file input elements for replacing existing images.
-   Fix issue where Safari would incorrectly render the crop size indicator on non-retinate displays.
-   Fix issue where `cropResizeMatchImageAspectRatio` would incorrectly zoom in when `imagePreviewScaleMode` was set to `'crop'`.

## 6.2.0 | 2020-01-06

-   Add `imagePreviewScaleMode`, set to `'crop'` to use actual pixel size of crop for preview image. Set to `'image'` to use pixel size of source image for preview image. Default is `'stage'`, fits preview to stage which matches the current behavior.
-   Improve rendering of keyboard indicator on top of image, now only shows when navigating to image preview with tab key.
-   Fix issue where `markupUtil` selection wouldn't work on init.
-   Fix issue with `allowImageFlipVertical` not working correctly.
-   Fix issue with color selection util not rendering correctly.
-   Fix issue where crop rectangle edges would not fully cover image.

## 6.1.0 | 2020-01-02

-   Add custom color selection util to the markup editor. Disable by setting `markupAllowCustomColor` to `false`.
-   Improve main menu style for narrow viewports. The corners are now rounded and the main action button has a prominent color.

## 6.0.0 | 2019-12-30

Markup style defaults properties have been renamed. This is a breaking change and therefor the major version number has changed as well. Previously the default styles were set using the index of the option in the linked style options list. Starting from this version the value is set using the actual value instead of the index.

This is only a breaking change if you've set different default values for the markup styles.

-   Add draw tool to markup view.
-   Set default markup style values using `markupColor` , `markupFontSize`, `markupFontFamily`, `markupShapeStyle`, and `markupLineDecoration`.
-   Add `markupDrawDistance` property, this controls the smoothness of the draw line.
-   Add auto switching between a dark and bright selection highlight based on the shape colors.
-   Add label properties for markup utils.
-   Fix issue with image head not being copied correctly when outputting a new image.

## 5.13.0 | 2019-12-20

-   Add more information to `update` event.
-   Add `cropAllowRotate` to toggle rotation control in crop util.
-   Add `util` property to programmatically set the current active util.
-   Fix issue where Chrome would throw error when accessing custom response headers.
-   Improve `setData` call, can now apply output data object.

## 5.12.0 | 2019-12-16

-   Add Svelte adapter components.
-   Fix issue where setting aspect ratio using the API resulted in an error message.

## 5.11.2 | 2019-12-12

-   Fix issue with SSR introduced by 5.11.1
-   Fix issue with dragging the editor window on iOS.

## 5.11.1 | 2019-12-12

-   Fix issue where adding multiple color filters would not render a scrollbar.
-   Fix issue where dragging the color adjustment tools would sometimes cause the knob to snap back to center after release.
-   Fix issue with IE throwing an error during loading and processing status.

## 5.11.0 | 2019-12-09

-   Add conditional compilation statements to MJS and SCSS source files. Add conditional compilation to your build script to optimize the output files based on which editor utils are enabled (can save up to 30%).
-   Fix issue where scroll instruction wasn't aligned to pixel grid resulting in blurred text on non-retina displays.
-   Fix issue where mousedown inside the modal and mouseup outside the modal would close the editor modal.

## 5.10.1 | 2019-12-02

-   Fix issue where the editor would throw an error on removal due to missing MODIFIER_KEYS variable.

## 5.10.0 | 2019-12-02

-   Add feature where tapping the modal overlay will close the modal.
-   Add progress indicator to load image status.
-   Add `afterCreateOutput` which allows modifying the output and updating the status message in the editor.
-   Add `labelResizeWidth`, `labelResizeHeight`, and `labelResizeApplyChanges` properties to control labels in resize view.
-   Add crop size indicator values are now animated when zooming in and out.
-   Add `cropAllowInstructionZoom`, when set to `true` this will show a small message to the user explaining how to zoom in and out (it'll only appear when the crop is centered and after two seconds of interaction). When the user scrolls or zooms in/out with the touchpad the message is hidden and will not re-appear (the editor will use `localStorage` to remember it has shown the message). The editor will use the value in the `storageName` property as the name for the `localStorage` entry.
-   Use `labelCropInstructionZoom` to change the label of the crop instruction bubble.
-   Update resize modifier key handling, when the array of key codes is empty the custom resize functionality is disabled.
-   Fix issue where clicks on menu wouldn't work while the menu bar was fading into view.
-   Fix issue where scrollbars where enabled on devices that showed no scrollbars causing a slight horizontal jump when opening the editor.
-   Fix issue where current and target aspect ratio wasn't calculated correctly resulting in weird zooming when switching between utils.
-   Fix issue where destroying the editor would throw a removeEventListener error when `allowDropFiles` was enabled.

## 5.9.0 | 2019-11-08

-   Update `labelStatusLoadImageError` to allow both a function and a string to be assigned. The function receives the image load error, the string returned by the function is presented in the status bubble shown by the editor to the user.
-   Fix issue where `getData` would not throw an error when called immediately after init.
-   Fix issue where status layer would be rendered outside of the editor when in modal mode.

## 5.8.0 | 2019-10-29

-   Add option to set `width` and `height` values to the aspect ratio dropdown. This turns the dropdown into a list of image size presets. When size values are used the aspect ratio is calculated based on the supplied dimensions.
-   Improve rendering performance and CSP compatibility by using `cssText` instead of `setAttribute` for updating view layout.

## 5.7.0 | 2019-10-10

-   Add `cropResizeMatchImageAspectRatio`, when enabled this will automatically adjust the crop aspect ratio to match the image aspect ratio if the user zooms out. Only works if the aspect ratio is set to "free".

## 5.6.0 | 2019-10-08

-   Add `cropAllowToggleLimit` to enable the "Crop selection" button.
-   Add `cropLimitToImageBounds` to toggle limiting the crop selection to the image bounds or allow cropping outside of the image.
-   Add `outputCanvasBackgroundColor` to control the color of the canvas when a transparent PNG is converted to JPEG and when cropping outside of the image bounds.
-   Add `outputCorrectImageExifOrientation` to toggle correcting image EXIF orientation on and off, this is on by default.
-   Fix issue where dragging the crop rectangle and scrolling the mouse wheel at the same time would throw an error.

If you are using the editor with FilePond, please update the following plugins

-   Image Edit to at least 1.5.0
-   Image Preview to at least 4.5.0
-   Image Transform to at least 3.5.0

## 5.5.1 | 2019-09-26

-   Fix issue where IE11 would not load images due to locked inner draw loop.

## 5.5.0 | 2019-09-24

-   Fix issue with missing handler in Angular profile demo.
-   Fix issue with Angular production build not working on example project, see example project README_DOKA.md for new installation instructions.
-   Add `onloadstart` callback.

## 5.4.1 | 2019-09-19

-   Fix issue with zoom scroll not working correctly within crop rectangle with inline editor.
-   Fix issue with the editor instantly focussing the first view on load.
-   Fix issue with color tools alignment.
-   Increase opacity of image overlay on all but crop view.
-   Lower height of crop and markup toolbar to create slightly more room for image.

## 5.4.0 | 2019-09-17

-   Add `allowBrowseFiles`, click on editor to upload new file while awaiting file input.
-   Add `cropAllowImageFlipHorizontal` and `cropAllowImageFlipVertical` to toggle flip buttons on and off.
-   Add `cropAllowImageTurnLeft` to toggle rotate left button.
-   Add `pointerEventsPolyfillScope`, set to 'document' to polyfill pointer events at the document level instead of the editor level, this will allow dragging outside of the editor on Safari (and other browsers lacking PointerEvent support).
-   Fix issue with WebGL error being thrown on black listed graphic cards/drivers.
-   Fix issue with scroll zoom not working when scrolling towards an already initialised editor.
-   Fix issue with weird image outline rendering issues on Firefox.
-   Fix issue where setting the `className` property would not assign the class to the editor root element.

## 5.3.1 | 2019-09-12

-   Improve WebGL performance on older devices by slightly lowering the canvas size. The editor now uses the `devicePixelRatio` times `.75`.
-   Fix issue where multi-touch interaction on the crop rectangle would throw an error.
-   Fix issue where releasing a drag operation on a markup shape would throw an error.

## 5.3.0 | 2019-09-06

-   Add `cropResizeScrollRectOnly` property to limit scroll resizing to the crop rectangle.
-   Fix issue where Edge would throw an error related to `toColor` method when closing the editor.

## 5.2.1 | 2019-09-03

-   Add "WebGL required" message to notify users when WebGL has been disabled on their browser.
-   Fix issue where main util menu wasn't always perfectly aligned to the center.
-   Fix issue where "Awaiting image" message would not show.
-   Fix issue where aspect ratio dropdown would show for a small moment.
-   Improve rendering of resize view.
-   Improve callbacks in TypeScript declaration file.

## 5.2.0 | 2019-09-02

-   Add Angular adapter components.
-   Fix problem with `cropAspectRatio` not updating the crop aspect ratio.
-   Fix TypeScript declaration file mismatch with standards.
-   Fix issue with crop size indicator throwing an error.
-   Fix issue with resize view not re-rendering correctly.
-   Improve TypeScript declaration file with better interfaces.

## 5.1.3 | 2019-08-29

-   Fix problem with double destroy method in GL layer.
-   Fix problem with hiding util buttons instead of removing them completely.
-   Fix problem where src scss file was not up to date.
-   Improve CSS to prevent style collisions.

## 5.1.2 | 2019-08-27

-   Fix issue with WebGL background gradient flickering on certain hardware.

## 5.1.1 | 2019-08-27

-   Fix problem with multitouch resizing not working.

## 5.1.0 | 2019-08-26

-   Improve rendering performance by switching to WebGL powered image layer.
-   Re-render when returning to editor from another tab.
-   Improve release of canvas memory on Safari.
-   All kinds of small performance improvements to limit use of CPU.
-   Add more error logging to process method.
-   Add keyboard navigation indicator icon.
-   Fix issue where pressing backspace to remove markup on Firefox would navigate away from the page.
-   Fix problem where creating the output image didn't work on iOS 10.

## 5.0.2 | 2019-08-22

-   Fix additional issue with shapes not loading after previous fix.
-   Fix problem with removing locked shapes.

## 5.0.1 | 2019-08-22

-   Fix issue where removed markup item was still rendered to canvas.
-   Fix issue where hidden error message would be thrown when closing the editor modal on Firefox.

## 5.0.0 | 2019-08-15

Although the major version number has been changed, this version is mostly backwards compatible. The only breaking change is that now all utils except the resize util are enabled by default.

If you've integrated the editor with FilePond, please make sure you update the FilePond Image Transform, Image Preview, and Image Edit plugins.

-   Add markup support.
-   Add support for predefined markup.
-   Add support for controlling which markup elements can be modified / edited.
-   An extensive set of performance improvements.
-   Improvements to examples templates.
-   Fix `cropAspectRatioOptions` throwing an error when set to an empty array.
-   Other small bug fixes and improvements.

## 4.8.3 | 2019-08-07

-   Fix additional problem with image processing step that caused a crash when no output size was set.

## 4.8.2 | 2019-08-07

-   Fix problem where Vue component didn't render correctly.
-   Update React example to include initial crop aspect ratio.

## 4.8.1 | 2019-08-06

-   Fix problem where output upscale setting crashed image processing step.

## 4.8.0 | 2019-08-05

-   Add output image width and height to `output.data.image` property.
-   Fix polyfill URLs in file upload library integration examples.

## 4.7.2 | 2019-07-31

-   Fix `ResizeMode` TypeScript property.
-   Add `outputCanvasMemoryLimit` to TypeScript files.
-   Add `tslint:disable` to Vue components to silence tslint warnings.
-   Add very basic `createDoka.d.ts` file so the editor Vue components are seen as Components.

## 4.7.1 | 2019-07-24

-   Recover Vue FilePond image editor integration example.

## 4.7.0 | 2019-07-24

-   Fix issue where iOS canvas memory limit could be exceeded. Add the `outputCanvasMemoryLimit` property which is automatically set to 16 megapixels on iOS devices. The editor will automatically scale output canvas size on these devices to prevent transparent output images.

## 4.6.4 | 2019-07-23

-   Improve defensive CSS styles for better compatibility with CSS frameworks.
-   Fix problem where EXIF info wasn't copied when `outputStripImageHead` was set to `false`.

## 4.6.3 | 2019-07-23

-   Fix style problem with React FilePond image editor integration example.
-   Fix problem with Vue demo's throwing error when loading Web Workers.
-   Add Vue FilePond image editor integration example.

## 4.6.2 | 2019-07-11

-   Fix issue where filter thumbnail was still skewed in some situations.

## 4.6.1 | 2019-07-08

-   Fix issue where a small canvas element was appended to the document body.

## 4.6.0 | 2019-07-02

-   Add `initialState` property to set state to reset to when reset button is pressed. Set to `null` to reset to the default editor state.
-   Add React FilePond image editor example integration.
-   Fix issue where filter previews showed a skewed image.
-   Fix issue where setting the `size` property would throw an error.
-   Fix issue where a `size` property update would not hide resize percentage indicator.
-   Improved performance of filter preview rendering.

## 4.5.2 | 2019-07-01

-   Add color transitions to various parts of the editor for nicer theme switching.
-   Add jQuery adapter.

## 4.5.1 | 2019-06-22

-   Fix `cannot read property scale of null` error.

## 4.5.0 | 2019-06-21

-   Add conditional close button to image error status message when in fullscreen mode so user can close the editor when an image fails to load.
-   Optimise and speed up image resize logic.
-   Fix rendering of cancel/exit button icon on Safari.
-   Fix problem where `outputUpscale` when set to `false` would sometimes skip applying image filters.
-   Fix problem with wrapping of utility tabs.

## 4.4.2 | 2019-06-20

-   Fix issue with minimum crop size not being calculated correctly for big images.
-   Fix issue with updating the available utils property.

## 4.4.1 | 2019-06-17

-   Fix issue where flipping the image preview would hide it.
-   Fix style collision with normalize.css.
-   Fix style collisions created by blanket `* { box-sizing: border-box; }`.

## 4.4.0 | 2019-06-13

This update adds the bright theme and a color control panel.

All color values in CSS are now accessible through CSS Custom Properties, see documentation for a detailed guide. CSS Custom Properties are supported in all major browsers except Internet Explorer 11, it will still have to be styled "manually".

-   Set `--doka-invert` to `100%` on the `.doka--root` element to set bright theme mode.
-   Add line crop corner style. Set the `styleCropCorner` to `'line'`, default is `'circle'`.
-   Add brightness, contrast, exposure, and saturation controls. Enable by adding the `'color'` util to the `utils` property.
-   Improve resize preview by taking into account the `devicePixelRatio` when calculating the image preview width and height.
-   Slightly increase distance between utility buttons and crop rectangle, this results in less miss clicks.
-   Fix issue where crop icon color would not be based on current color.
-   Removed rounded corners from size indicator, this makes it look more distinct from the crop corners. Set `--doka-size-indicator--radius` to `9999em` to restore rounded corners.

## 4.3.3 | 2019-06-06

-   Fix issue where IE11 would throw an error because of using `Number.isNaN` instead of `isNaN`.
-   Fix issue where crop rectangle size could fall below minimum image size when switching from free to a fixed ratio crop.
-   Fix issue where crop rectangle size could fall below minimum image size when free cropping a very small image.
-   Fix issue when selecting crop aspect ratios that would result in invalid crops for very small images by hiding the invalid crop ratios.

## 4.3.2 | 2019-06-05

-   Fix issue where native examples no longer worked on IE11 because polyfill was loaded incorrectly.
-   Fix issue where min crop size was not respected while dragging corner crop controls.
-   Fix issue where filter thumbnail images were skewed when image EXIF orientation header was set.
-   Add "src" folder. This folder contains the merged source files. The JavaScript is written in ES6, this will need to be transpiled to function. The CSS files are written in Sass so will need to be converted to CSS to function.

## 4.3.1 | 2019-05-31

-   Fix issue where native examples did not load filters.
-   Fix issue where font weight of buttons could be easily and accidentally overruled by other styles.
-   Fix issue with internal paint loop not handling inactive tab state correctly.

## 4.3.0 | 2019-05-28

-   Fix issue where tab buttons would not enforce the editor `line-height`.
-   Fix issue where image error status bubble would appear in bottom right corner on Safari 12.
-   Fix problem where document body would receive min height of 512 pixels.
-   Add image information object to `onload` event.
-   Add `onupdate` event which shares the current crop width and height.
-   Add `allowPreviewFitToView` option, set to `false` to prevent the editor from upscaling the preview image.
-   Update example projects to include filter and resize utilities.

## 4.2.0 | 2019-05-24

-   Add filters, enable by adding the `'filter'` string to the `utils` property.
-   Redesigned the Crop and Resize utility icons.
-   Fix issue where dragging an image would throw an error on Safari.
-   Fix issue where bottom safe area on iOS was always active, now only activates when Safari footer menu is not visible.
-   Fix issue where outlines were invisible in high contrast mode.
-   Fix issue where SVG elements were focusable on IE and Edge.
-   Update TypeScript definitions.

## 4.1.2 | 2019-05-09

-   Fix issue where React module was a build target instead of the original source files.

## 4.1.1 | 2019-05-02

-   Fix issue where certain aspect ratios could overflow the minimum and maximum image size.

## 4.1.0 | 2019-04-26

-   Fix issue where resize and crop size width and height were reported incorrectly for large images.
-   Fix issue where scrollwheel was still available in resize view.
-   Fix issue where degree character would render incorrectly by replacing it with its HTML entity `&deg;`.
-   Fix issue where rotating the image 180 degrees and then flipping it would in not flip along the correct axis.
-   Fix issue where typescript definitions for `getData`, `setData`, and `save` were malformed.
-   Improved rendering of crop/resize image edges, they now better overlap with the image.
-   Add `onloaderror` callback to programmatically handle image load error status.
-   Add `afterCreateBlob` hook to allow modifying the Blob data before it's outputted by the editor.

## 4.0.3 | 2019-04-11

-   Fix issue where loading indicator view would break outside of editor when editor was inlined on the page.
-   Fix issue where status message would unevenly draw background color of editor.
-   Fix issue where zoom button would be clickable while hidden.
-   Fix issue where settings the aspect ratio to free was no longer possible after loading an image with a given aspect ratio.
-   Update TypeScript doka.d.ts file with new options added in version 4.

## 4.0.2 | 2019-04-08

-   Fix issue where editor would not clean up properly when exiting full screen mode.

## 4.0.1 | 2019-04-04

-   Add feature where turning is automatically done by 180 degree intervals if 90 degree does not fit the required minimum crop size.
-   Fix issue where crop mask overlay would log a series of errors.
-   Fix issue where crop mask overlay animation would not sync up with image and crop animations.

## 4.0.0 | 2019-04-04

This is a major release as internally a lot of elements have changed, still it shouldn't break anything. If you're targeting the editor inner elements to apply different styles then the related CSS selectors might have to be updated.

-   Add Resize util. Enable by setting the `utils` option to `['crop', 'resize']`. The array also controls the order of the menu items.
-   Add `size`, `sizeMin`, and `sizeMax` options to control image output size.
-   Add size indicator in crop view, toggle with `cropShowSize`, default is `false`.
-   Change `cropMinImageWidth` default value to `1`.
-   Change `cropMinImageHeight` default value to `1`.
-   Add `labelButtonUtilCrop` option.
-   Add `labelButtonUtilResize` option.
-   Improve animations to be just a little bit less bouncy.
-   Fix issue where window resize sometimes caused view updates to not render correctly.
-   Fix issue where main menu overlapped with top crop edge and corners making it difficult to control the crop area in some situations.
-   Various tiny fixes and improvements.

## 3.1.0 | 2019-02-21

-   Add editor methods to React components.
-   Add Vue components and demos.
-   Add crop mask example to React and Vue demos.
-   add `save` method to manually save the currently loaded image. This is basically an alias for `getData`.
-   add `onload` callback which is called when an image has been successfully loaded.
-   Fix issue where the editor would prevent default on the `mousemove` event.
-   Fix issue where aspect ratio dropdown would not select the free aspect ratio.
-   Fix issue where modal close event was fired multiple times if modal was not immediately removed from DOM.

## 3.0.0 | 2019-02-12

This release adds React components to the package.

-   Fix issue with zoom timeout where multiple editor instances were sharing the same timeout id.
-   Fix issue where passing a `cropAspectRatio` to `edit` or `open` would make it the default crop aspect ratio.
-   Now only automatically closes and removes itself when in modal mode. When the editor is in preview or in-page layout mode it needs to be closed programmatically.
-   Removed `queue` mode, the active file is now replaced if a new file is added, by listening to the `onconfirm` event it's still possible to walk over a queue of files. Samples have been updated.
-   Add `allowAutoClose` to disable automatically closing the modal. The modal can then be programmatically closed using the `close()` method.
-   Add `allowAutoDestroy`, if enabled the editor will automatically destroy itself when the modal is closed.
-   Renamed `labelButtonClose` to `labelButtonCancel`.
-   Renamed `allowButtonClose` to `allowButtonCancel`.
-   Fix issue where `clear()` method did not work, it now removes the active image from view.
-   Cancelling editing an image will no longer reject the returned Promise, it will resolve it returning `null`.
-   Add `beforeCreateBlob` to adjust the output data before the Blob is created, useful for when you want to add a watermark.
-   Add `crop` options, to programmatically update the current crop rectangle.
-   Fix file processing popup, will now only show when the file is actually being processed.
-   Add more examples to the package.
-   Update TypeScript definitions.

## 2.3.1 | 2019-01-22

-   Update Typescript definitions.

## 2.3.0 | 2019-01-22

-   Add `cropMask` and `cropMaskInset` which can be used to plot a mask overlay on top of the crop area.

## 2.2.1 | 2019-01-17

-   Fix issue where server side rendering would not work.

## 2.2.0 | 2019-01-03

-   Add `cropMinImageWidth` and `cropMinImageHeight` properties.
-   Fix issue where zoom button could not be clicked when crop area was very small.

## 2.1.2 | 2018-12-27

-   Fix issue where a resize of the image would prevent the editor from working on Android.

## 2.1.1 | 2018-12-22

-   Fix issue where the image was flipped along the incorrect axis when rotated.
-   Remove flip indicator from flip buttons.

## 2.1.0 | 2018-12-22

-   Add typescript definitions file for the editor module.
-   Add modal layout mode, set `styleLayoutMode` to `modal` to enable (only works in fullscreen mode). See docs for further instructions.
-   Add key listener to allow closing of the modal and fullscreen mode by pressing the escape key.
-   Add `outputStripImageHead` property, set to `false` to copy JPEG EXIF data to output file.
-   Add /_ eslint-disable _/ statement to each file library file to prevent collisions with es lint.
-   Improve responsive rendering of crop tools menu so it correctly renders no matter how many buttons are active.
-   Fix FilePond sample, image edit plugin should be registered last.

## 2.0.1 | 2018-12-04

-   Fix issue with alignment of editor on IE11.
-   Fix issue with alignment of aspect ratio dropdown on IE11.
-   Fix issue with smoke overlay not rendering correctly on IE11.

## 2.0.0 | 2018-11-25

-   Add keyboard navigation.
-   Add aspect ratio dropdown.
-   Add loading and processing image indicators.
-   Add open API endpoint to manually open images.
-   Add open API endpoint to manually edit images.
-   Add getData API endpoint to manually retrieve image data.
-   Add setData API endpoint to manually update image data.
-   Add option to use Image and Canvas tags as a source.
-   Add option to configure labels.
-   Add option to drop images directly on the editor.
-   Add option to disable menu buttons.
-   Add zoom timeout option.
-   Add image transform options.
-   Add functionality that blocks interactions when loading or processing images.
-   Add container mode, run one or multiple editors in-page instead of fullscreen.
-   Add preview mode, run the editor in a preview overlay on top on an image.
-   Add integrations with different file upload solutions.
-   Improve rescaling of the editor.
-   Improve rendering by syncing with FilePond internal render engine if present.
-   Improve handling of keyboard focus, now moves to the editor when active.
-   Improve style of cancel, reset and confirm buttons.
-   Improve presentation of flip buttons.
-   Improve the keyboard focus indicator.
-   Fix issue where button icons would incorrectly align on older browsers.
-   Fix issue where the editor view would be incorrectly centered on Internet Explorer 11.
-   Fix issue where iOS bottom footer would interfere with the editor.
-   Fix issue where focus could leave editor when in fullscreen mode.
-   Fix close window animation.

## 1.0.2 | 2018-11-01

-   Fix issue with resize controls not being positioned correctly when the viewport is very big.

## 1.0.1 | 2018-10-12

-   Fix issue with dynamic font size on body of editor.
-   Fix issue with resize controls not being positioned correctly.
-   Fix issue where reset and zoom icons would be positioning incorrectly on small viewports.

## 1.0.0 | 2018-10-05

-   Initial release.
