/* eslint-disable @typescript-eslint/no-explicit-any */
export type ProgressCallback = (event: ProgressEvent) => void;

export type Percentage = string;

export interface PinturaMetadata {
    [key: string]: any;
}

// prettier-ignore
/**
 * A matrix of 20 digits based on the SVG <feColorMatrix> filter
 *
 * @example
 * ```
 *     R G B A W
 * R | 1 0 0 0 0
 * G | 0 1 0 0 0
 * B | 0 0 1 0 0
 * A | 0 0 0 1 0
 * ```
 * @link Utility to generate a color matrix: https://fecolormatrix.com
 * @link More information on color matrices: https://developer.mozilla.org/en-US/docs/Web/SVG/Element/feColorMatrix
 */
export type  ColorMatrix = [
    number, number, number, number, number,
    number, number, number, number, number, 
    number, number, number, number, number, 
    number, number, number, number, number
];

// prettier-ignore
/**
 * A matrix of 9 digits based on the SVG <feConvolveMatrix> filter
 *
 * @example
 * ```
 * 1 0 0
 * 0 1 0
 * 0 0 1
 * ```
 * @link More information on convolution matrices: https://developer.mozilla.org/en-US/docs/Web/SVG/Element/feConvolveMatrix
 */
export type  ConvolutionMatrix = [
    number, number, number, 
    number, number, number, 
    number, number, number
];

export type Color = number[];

export type TextAlign = 'left' | 'center' | 'right';

export type TextLayout = 'auto-width' | 'auto-height' | 'fixed-size';

export type SizeCategory =
    | 'extraSmall'
    | 'small'
    | 'mediumSmall'
    | 'medium'
    | 'mediumLarge'
    | 'large'
    | 'extraLarge';

export type LineEndStyle =
    | 'bar'
    | 'arrow'
    | 'arrowSolid'
    | 'circle'
    | 'circleSolid'
    | 'square'
    | 'squareSolid';

export interface ColorPalette {
    transparent?: Color;
    white?: Color;
    silver?: Color;
    gray?: Color;
    black?: Color;
    navy?: Color;
    blue?: Color;
    aqua?: Color;
    teal?: Color;
    olive?: Color;
    green?: Color;
    yellow?: Color;
    orange?: Color;
    red?: Color;
    maroon?: Color;
    fuchsia?: Color;
    purple?: Color;
}

export type SizeCategories = Record<SizeCategory, Percentage | number>;

export interface LocaleCollection {
    [shapeProperty: string]: string;
}

export type LocaleString = string | ((locale: LocaleCollection) => string);

export interface Vector {
    x: number;
    y: number;
}

export interface Size {
    width: number;
    height: number;
}

export interface Rect {
    x: number;
    y: number;
    width: number;
    height: number;
}

export interface ShapeToolOptions {
    position?: string;
    inputMode?: string;
    isSelection?: boolean;
}

export interface ShapeRectangle {
    x?: number | Percentage;
    y?: number | Percentage;
    width?: number | Percentage;
    height?: number | Percentage;
}

export interface Shape {
    x?: number | Percentage;
    y?: number | Percentage;
    width?: number | Percentage;
    height?: number | Percentage;
    left?: number | Percentage;
    top?: number | Percentage;
    right?: number | Percentage;
    bottom?: number | Percentage;
    rx?: number | Percentage;
    ry?: number | Percentage;
    x1?: number | Percentage;
    y1?: number | Percentage;
    x2?: number | Percentage;
    y2?: number | Percentage;
    strokeColor?: Color;
    strokeWidth?: number | Percentage;
    cornerRadius?: number | Percentage;
    fontSize?: number | Percentage;
    fontFamily?: string;
    lineHeight?: number | Percentage;
    textAlign?: undefined | 'left' | 'center' | 'right';
    letterSpacing?: number | Percentage;
    text?: string;
    textShadow?: [number | Percentage, number | Percentage, number | Percentage, Color];
    textShadowX?: number | Percentage;
    textShadowY?: number | Percentage;
    textShadowBlur?: number | Percentage;
    textShadowColor?: Color;
    textOutline?: [number | Percentage, Color];
    textOutlineWidth?: number | Percentage;
    textOutlineColor?: Color;
    format?: 'text' | 'html';
    aspectRatio?: number;
    rotation?: number;
    points?: Vector[];
    bitmap?: boolean;
    strokeCap?: 'miter' | 'bevel' | 'round' /** only works when `bitmap` is set to `true` */;
    strokeJoin?: 'miter' | 'bevel' | 'round' /** only works when `bitmap` is set to `true` */;
    strokeDash?: (number | Percentage)[];
    cursorStyle?: undefined | 'ellipse';
    cursorSize?:
        | number
        | string /** a fixed size, or reference to other shape property, for example `'strokeWidth'` */;
    color?: Color;
    backgroundColor?: Color;
    backgroundImage?: string | HTMLCanvasElement | File | Blob | HTMLImageElement;
    backgroundSize?: string | Size;
    selectionStyle?: 'auto' | 'hook' /** hook only renders selection corners */;
    feather?: number | Percentage /** only works with rectangles, feathers edges of shape */;
    eraseRadius?: number;
    alwaysOnTop?: boolean;
    lineStart?:
        | undefined
        | 'bar'
        | 'arrow'
        | 'arrow-solid'
        | 'square'
        | 'square-solid'
        | 'circle'
        | 'circle-solid';
    lineEnd?:
        | undefined
        | 'bar'
        | 'arrow'
        | 'arrow-solid'
        | 'square'
        | 'square-solid'
        | 'circle'
        | 'circle-solid';
    status?: 'loading' | 'error';
    isSelected?: boolean;
    isEditing?: boolean;
    disableStyle?: boolean | string[];
    disableErase?: boolean;
    disableSelect?: boolean;
    disableRemove?: boolean;
    disableDuplicate?: boolean;
    disableReorder?: boolean;
    disableFlip?: boolean;
    disableInput?: boolean | ((text: string) => string);
    disableManipulate?: boolean;
    disableMove?: boolean;
    disableResize?: boolean;
    disableRotate?: boolean;
    disableTextLayout?: boolean | TextLayout[];
    disableNewline?: boolean;

    // private
    readonly _context?: Rect | Size;
    readonly _isDraft?: boolean;
    readonly _isComplete?: boolean;
    readonly _isError?: boolean;
    readonly _isFormatted?: boolean;
}

export type SvelteComponent = any;
export type SvelteComponentProps = any;

export type ShapeControl = [
    // Component to use
    SvelteComponent,

    // Component properties to map
    {
        title?: LocaleString;
        label?: LocaleString;
        options?: SvelteComponentProps;
        optionIconStyle?: LocaleString;
        optionLabelStyle?: LocaleString;
    }
];

export type ShapeColorOption = [Color, string] | [Color, string, any];
export type ShapeSizeOption = [number | Percentage, string] | [number | Percentage, string, any];

export type ShapeLineEndOption = [LineEndStyle, string] | [LineEndStyle, string, any];
export type ShapeFontFamilyOption = [string, string] | [string, string, any];
export type ShapeFontStyleOption = [string, string] | [string, string, any];

export interface ShapeControlOptions {
    // shortcuts to set style options
    colorOptions?: false | ShapeColorOption[];
    lineEndStyleOptions?: false | ShapeLineEndOption[];
    fontFamilyOptions?: false | ShapeFontFamilyOption[];
    fontStyleOptions?: false | ShapeFontStyleOption[];
    textAlignOptions?: false | [TextAlign, string][];
    strokeWidthOptions?: false | ShapeSizeOption[] | number[];
    fontSizeOptions?: false | ShapeSizeOption[] | number[];
    lineHeightOptions?: false | ShapeSizeOption[] | number[];
    // shortcut to set style controls
    [styleProperty: string]: ShapeControl | any;
}

export interface ShapeControlConfiguration {
    // A mapping of a shapeProperty to a Component
    [shapeProperty: string]: ShapeControl;
}

export type StickerSource = string; // emoji or URL

export interface StickerTemplate {
    thumb?: StickerSource;
    src?: StickerSource;
    width?: number;
    height?: number;
    alt?: string;
    disabled?: boolean;
    shape?: Shape;
    mount?: (
        element: HTMLElement,
        sticker: StickerTemplate
    ) => { update?: (sticker: StickerTemplate) => void; destroy?: () => void };
}

export type Sticker = StickerSource | StickerTemplate;

export interface StickerGroupOptions {
    icon?: string;
    hideLabel?: boolean;
    disabled?: boolean;
}

export type StickerGroup = [string, Sticker[]] | [string, Sticker[], StickerGroupOptions];

export type ImageSource = File | Blob | string | HTMLImageElement | HTMLCanvasElement;

export interface Store {
    subscribe: (value: (value: any) => void) => () => void;
    set?: (value: any) => void;
    update?: (fn: (value: any) => any) => void;
}

export interface StoreCollection {
    [shapeProperty: string]: Store;
}

export type Filter = () => ColorMatrix;

export interface Frame {
    shape: any;
    thumb: string; // HTML or SVG
}

export interface Effect {
    base: number;
    min: number;
    max: number;
    getLabel?: (value: number) => number;
    getStore: (stores: StoreCollection) => Store;
    getValue: (store: Store) => number;
    setValue: (store: Store, value: number) => void;
}

export interface PinturaEditorHistoryAPI {
    undo: () => number;
    redo: () => number;
    revert: () => void;
    write: (imageState?: PinturaImageState) => void;
    get: () => PinturaImageState[];
    getCollapsed: () => PinturaImageState[];
    set: (imageStates: PinturaImageState[]) => void;
    readonly length: number;
    readonly index: number;
}

export interface PinturaEditorMethods {
    on: (event: string, cb: (detail?: any) => void) => void;
    loadImage: (
        src: ImageSource,
        options?: PinturaEditorOptions
    ) => Promise<PinturaDefaultImageReaderResult>;
    editImage: (
        src: ImageSource,
        options?: PinturaEditorOptions
    ) => Promise<PinturaDefaultImageWriterResult>;
    processImage: (
        src?: ImageSource,
        options?: PinturaEditorOptions
    ) => Promise<PinturaDefaultImageWriterResult>;
    abortLoadImage: () => void;
    abortProcessImage: () => void;
    updateImage: (src: ImageSource) => Promise<PinturaDefaultImageReaderResult>;
    updateImagePreview: (src: ImageSource) => void;
    removeImage: () => void;
    close: () => void;
    destroy: () => void;

    showTextInput: (
        confirm: (value: string) => void,
        cancel: () => void,
        options: {
            text?: string;
            placeholder?: string;
            autoClose?: boolean;
            align?: 'top' | 'bottom' | 'center';
            justify?: 'left' | 'right' | 'center';
            buttonConfirm?: {
                label: string;
                hideLabel?: boolean;
                icon?: string;
            };
            buttonCancel?: {
                label: string;
                hideLabel?: boolean;
                icon?: string;
            };
        }
    ) => void;
    hideTextInput: () => void;

    readonly history: PinturaEditorHistoryAPI;

    /** (video only) starts playing a video */
    play: () => void;

    /** (video only) pauses a playing video */
    pause: () => void;

    /** (video only) toggle between play and pause mode */
    togglePlayPause: () => void;

    /** (video only) returns `true' if the video is paused */
    isPaused: () => void;

    /** (video only) mutes audio */
    mute: () => void;

    /** (video only) restores audio */
    unmute: () => void;

    /** (video only) toggles mute state */
    toggleMute: () => void;

    /** (video only) returns the video duration in seconds */
    getDuration: () => number;

    /** (video only) returns the current position in seconds */
    getCurrentTime: () => number;

    /** (video only) sets the current position in seconds */
    setCurrentTime: (seconds: number) => void;
}

export type CropOption = [number | undefined, string];

export type SizeOption = [[number, number], string];

export type CropPresetOption = CropOption | SizeOption;

export type OptionGroup = [string, any[]] | [string, any[], any];

export interface TrimPluginOptions {
    trimEnableSplit?: boolean;
    trimEnableFramePreview?: boolean;
    trimEnableMediaClipper?: boolean;
    trimEnablePlayPauseButton?: boolean;
    trimEnableMuteButton?: boolean;
}

export interface CropPluginOptions {
    cropAutoCenterImageSelectionTimeout?: undefined | number;
    cropWillRenderImageSelectionGuides?:
        | undefined
        | ((
              interaction: string,
              interactionFraction: number
          ) => { rows: number; cols: number; opacity: number });
    cropEnableButtonFlipHorizontal?: boolean;
    cropEnableButtonFlipVertical?: boolean;
    cropEnableButtonRotateLeft?: boolean;
    cropEnableButtonRotateRight?: boolean;
    cropEnableButtonToggleCropLimit?: boolean;
    cropEnableCenterImageSelection?: boolean;
    cropEnableImageSelection?: boolean;
    cropEnableInfoIndicator?: boolean;
    cropEnableLimitWheelInputToCropSelection?: boolean;

    /**
     * Range in radians, defaults to Math.PI / 4
     */
    cropEnableRotationInput?: boolean;
    cropRotationRange?: number;
    cropActiveTransformTool?: 'zoom' | 'rotation';
    cropEnableSelectPreset?: boolean;
    cropEnableZoomInput?: boolean;
    cropEnableZoomMatchImageAspectRatio?: boolean;
    cropEnableZoomTowardsWheelPosition?: boolean;
    cropEnableZoomAutoHide?: boolean;
    cropImageSelectionCornerStyle?: undefined | 'hook' | 'round' | 'invisible';
    cropSelectPresetOptions?: OptionGroup[] | CropPresetOption[];
    cropSelectPresetFilter?: 'landscape' | 'portrait' | false;
    cropEnableRotateMatchImageAspectRatio?: 'never' | 'custom' | 'always';
    cropWillRenderTools?: (nodes: PinturaNode[], env: any, redraw: () => void) => PinturaNode[];
    cropInteractionFocus?: 'image' | 'selection';
    cropMinimizeToolbar?: 'never' | 'auto' | 'always';
}

export interface ShapeToolButtonOptions {
    icon?: string;
}

export type ShapeTool = [string, LocaleString] | [string, LocaleString, ShapeToolButtonOptions];

export interface PinturaMarkupEditorProperties {
    markupEditorToolbar?: [string, LocaleString, any][];
    markupEditorToolStyles?: MarkupEditorToolStyleDefaults;
    markupEditorToolRetainStyles?: boolean;
    markupEditorShapeStyleControls?:
        | MarkupEditorShapeStyleControlDefaults
        | MarkupEditorShapeStyleControlOptions;
    markupEditorToolSelectRadius?: number;

    /**
     * Set to `'modal'` to show a text input popup, set to `'inline'` to enable inline text editing.
     */
    markupEditorTextInputMode?: 'modal' | 'inline';

    /**
     * Enable to automatically add a shape when a tool is selected
     */
    enableSelectToolToAddShape?: boolean;

    /**
     * Enable to tap canvas to add text box instead of dragging
     */
    enableTapToAddText?: boolean;

    /**
     * Enable to show the move/arrow, used to select and manipulate shapes
     */
    enableMoveTool?: boolean;

    /**
     * Enable to show the hand/view tool, used to pan the canvas
     */
    enableViewTool?: boolean;

    /**
     * Wether to automatically select move tool when enabled, set to `true` to select for all tools, set to `false` to don't select, set to array of tool names to enable for specific tools only.
     */
    enableAutoSelectMoveTool?: boolean | string[];

    /**
     * @deprecated Use `enablePanInput` instead
     */
    markupEditorInteractionMode?: 'auto' | 'pan';

    /**
     * @deprecated Use `zoomLevel` instead
     */
    markupEditorZoomLevel?: number | undefined | null;

    /**
     * @deprecated Use `zoomPresetOptions` instead
     */
    markupEditorZoomLevels?: number[];

    /**
     * @deprecated Use `zoomAdjustStep` instead
     */
    markupEditorZoomAdjustStep?: number;

    /**
     * @deprecated Use `zoomAdjustFactor` instead
     */
    markupEditorZoomAdjustFactor?: number;

    /**
     * @deprecated Use `zoomAdjustWheelFactor` instead
     */
    markupEditorZoomAdjustWheelFactor?: number;

    markupEditorWillStartInteraction?: (point: Vector, image: Rect) => boolean;
}

export interface AnnotatePluginOptions extends PinturaMarkupEditorProperties {
    annotateTools?: [string, LocaleString, any][] | [string, [string, LocaleString, any][]][];
    annotateToolShapes?: MarkupEditorToolStyleDefaults;
    annotateShapeControls?: MarkupEditorShapeStyleControlDefaults;
    annotateActiveTool?: string;
    annotateEnableButtonFlipVertical?: boolean;
    annotatePresets?: Sticker[] | StickerGroup[];
    annotateEnableDropImagePreset?: boolean;
    annotateEnableSelectImagePreset?: boolean;
}

export interface DecoratePluginOptions extends PinturaMarkupEditorProperties {
    decorateTools?: [string, LocaleString, any][] | [string, [string, LocaleString, any][]][];
    decorateToolShapes?: MarkupEditorToolStyleDefaults;
    decorateShapeControls?: MarkupEditorShapeStyleControlDefaults;
    decorateActiveTool?: string;
    decorateEnableButtonFlipVertical?: boolean;
    decoratePresets?: Sticker[] | StickerGroup[];
    decorateEnableDropImagePreset?: boolean;
    decorateEnableSelectImagePreset?: boolean;
}

export interface FilterPluginOptions {
    filterFunctions?: { [key: string]: Filter };
    filterOptions?: any;
}

export interface FinetunePluginOptions {
    finetuneControlConfiguration?: { [key: string]: Effect };
    finetuneOptions?: [string | undefined, LocaleString][];
}

export interface ResizePluginOptions {
    resizeMaxSize?: Size;
    resizeMinSize?: Size;
    resizeSizePresetOptions?: OptionGroup[] | SizeOption[];
    resizeWidthPresetOptions?: OptionGroup[] | SizeOption[];
    resizeHeightPresetOptions?: OptionGroup[] | SizeOption[];
    resizeWillRenderFooter?: (nodes: PinturaNode[], env: any, redraw: () => void) => PinturaNode[];
}

export interface FramePluginOptions {
    frameStyles?: {
        [key: string]: {
            shape: {
                frameStyle: string;
                [key: string]: any;
            };
            thumb: string;
        };
    };
    frameOptions?: [string | undefined, LocaleString][];
}

export interface FillPluginOptions {
    fillOptions?: [string | undefined, LocaleString][];
}

export interface RetouchPluginOptions {
    retouchTools?: [string, LocaleString, any][] | [string, [string, LocaleString, any][]][];
    retouchToolShapes?: MarkupEditorToolStyleDefaults;
    retouchShapeControls?: MarkupEditorShapeStyleControlDefaults;
    retouchWillRenderShapeControls?: (nodes: PinturaNode[], shapeId: string) => PinturaNode[];
    retouchEnableViewTool?: boolean;
    retouchEnableMoveTool?: boolean;
}

export interface StickerPluginOptions {
    stickers?: Sticker[] | StickerGroup[];
    stickerForceEnable?: boolean;
    stickerStickToImage?: boolean;
    stickerEnableDropImagePreset?: boolean;
    stickerEnableSelectImagePreset?: boolean;
    stickerEnableButtonFlipVertical?: boolean;
    stickerWillRenderShapePresetToolbar?: (
        nodes: PinturaNode[],
        addPreset: (sticker: Sticker) => void,
        env: any,
        redraw: () => void
    ) => PinturaNode[];

    /**
     * @deprecated Use `stickerEnableSelectImagePreset` instead
     */
    stickerEnableSelectImage?: boolean;

    /**
     * @deprecated Use `stickerEnableButtonFlipVerticalt instead
     */
    stickersEnableButtonFlipVertical?: boolean;

    /**
     * @deprecated Use `stickerWillRenderShapePresetToolbar` instead
     */
    stickersWillRenderShapePresetToolbar?: (
        nodes: PinturaNode[],
        addPreset: (sticker: Sticker) => void,
        env: any,
        redraw: () => void
    ) => PinturaNode[];
}

export interface PinturaImageState {
    annotation?: Shape[];
    backgroundColor?: Color;
    backgroundImage?: string | undefined;
    colorMatrix?: ColorMatrix | undefined;
    convolutionMatrix?: ConvolutionMatrix | undefined;
    crop?: Rect;
    cropAspectRatio?: number | undefined;
    cropLimitToImage?: boolean;
    cropMaxSize?: Size;
    cropMinSize?: Size;
    decoration?: Shape[];
    duration?: number;
    flipX?: boolean;
    flipY?: boolean;
    frame?: string | undefined;
    gamma?: number | undefined;
    metadata?: PinturaMetadata | undefined;
    redaction?: ShapeRectangle[];
    manipulation?: ShapeRectangle[];
    rotation?: number;
    targetSize?: Size | undefined;
    trim?: [number, number][] | undefined;
    vignette?: number | undefined;
    volume?: number | undefined;
    minDuration?: number;
    maxDuration?: number;
}

export interface PinturaImageOptions extends PinturaImageState {
    readonly size: Size;
    readonly aspectRatio: number;
    readonly cropSize: Size;
    readonly cropRectAspectRatio: number;
    readonly file: File;
    readonly loadState: any;
    readonly processState: any;
    readonly rotationRange: [number, number];
    state?: any;
}

export interface PinturaEditorImageOptionsReadonly {
    readonly imageSize: Size;
    readonly imageAspectRatio: number;
    readonly imageCropSize: Size;
    readonly imageCropRectAspectRatio: number;
    readonly imageFile: File;
    readonly imageLoadState: any;
    readonly imageProcessState: any;
    readonly imageRotationRange: [number, number];
}

export interface PinturaEditorImageOptions {
    imageBackgroundColor?: Color;
    imageBackgroundImage?: ImageSource;
    imageColorMatrix?: ColorMatrix;
    imageConvolutionMatrix?: ConvolutionMatrix;
    imageCrop?: Rect;
    imageCropAspectRatio?: number | undefined;
    imageCropLimitToImage?: boolean;
    imageCropMaxSize?: Size;
    imageCropMinSize?: Size;
    imageMinDuration?: number;
    imageMaxDuration?: number;
    imageRedaction?: ShapeRectangle[];
    imageManipulation?: ShapeRectangle[];
    imageAnnotation?: Shape[];
    imageDecoration?: Shape[];
    imageFlipX?: boolean;
    imageFlipY?: boolean;
    imageGamma?: number;
    imageNoise?: number;
    imageRotation?: number;
    imageVignette?: number;
    imageTargetSize?: Size;
    imageTrim?: [number, number][];
    imageVolume?: number;
    imageFrame?:
        | string
        | {
              [key: string]: any;
              frameStyle: string;
          };
    imageMetadata?: PinturaMetadata;
    imageState?: PinturaImageState;
}

export interface PinturaEditorOptionsReadonly {
    readonly element?: HTMLElement;
    readonly stores?: any[];
    readonly images?: any;
}

export interface PinturaNodeOptions {
    [key: string]: any;
}

export type PinturaComponent = 'Button' | 'Dropdown';

export type PinturaNodeType = string | SvelteComponent | PinturaComponent;

// ignore for TypeScript 3.x
// @ts-ignore
export type PinturaNode =
    | [PinturaNodeType, string]
    | [PinturaNodeType, string, PinturaNodeOptions]
    | [PinturaNodeType, string, PinturaNode[]]
    | [PinturaNodeType, string, PinturaNodeOptions, PinturaNode[]];

export type PinturaEditorStatus =
    | string
    | [string]
    | [string, number]
    | [string, false]
    | undefined;

export interface PinturaEditorBaseOptions {
    id?: string;
    class?: string;
    animations?: boolean;
    src?: ImageSource;
    util?: string;
    utils?: string[];
    disabled?: boolean;
    status?: PinturaEditorStatus;
    elasticityMultiplier?: number;
    layoutDirectionPreference?: 'auto' | 'horizontal' | 'vertical';
    layoutVerticalUtilsPreference?: 'left' | 'right';
    layoutHorizontalUtilsPreference?: 'bottom' | 'top';
    layoutVerticalControlGroupsPreference?: 'bottom' | 'top';
    layoutVerticalControlTabsPreference?: 'bottom' | 'top';
    layoutVerticalToolbarPreference?: 'bottom' | 'top';
    imageSourceToImageData?: (src: any) => Promise<ImageData>;
    previewImageData?: ImageBitmap | ImageData | HTMLCanvasElement;
    previewImageDataMaxSize?: Size;
    previewUpscale?: boolean;
    previewPad?: boolean;
    previewMaskOpacity?: number;
    shapePreprocessor?: any;
    enableTransparencyGrid?: boolean;
    enableCanvasAlpha?: boolean;
    enableButtonClose?: boolean;
    enableButtonExport?: boolean;
    enableButtonResetHistory?: boolean;
    enableButtonRevert?: boolean;
    enableNavigateHistory?: boolean;
    enableToolbar?: boolean;
    enableUtils?: boolean;
    enableDropImage?: boolean;
    enablePasteImage?: boolean;
    enableBrowseImage?: boolean;
    willSetMediaInitialTimeOffset?: (duration: number, trim: [number, number][]) => number;
    muteAudio?: boolean;

    /**
     * Switch text direction to right-to-left instead of the default left-to-right
     */
    textDirection?: 'rtl' | 'ltr';

    /**
     * Enable to toggle zooming the canvas with multi-touch input and mouse wheel
     */
    enableZoom?: boolean;

    /**
     * Enable to show zoom controls
     */
    enableZoomControls?: boolean;

    /**
     * Enable to toggle panning the canvas, pan with two fingers or by holding spacebar
     */
    enablePan?: boolean;

    /**
     * Set to false to disable limiting pan input to the centered image bounds
     */
    enablePanLimit?: boolean;

    /**
     * Gutter scalar to add around the pan limit bounds, value between 0 and 1, 0 no gutter, 1 gutter size of centered image
     */
    panLimitGutterScalar?: number;

    /**
     * Set current zoom level or set undefined to fit to view, set null to let editor handle zoom level
     */
    zoomLevel?: number | undefined | null;
    zoomPresetOptions?: number[];
    zoomAdjustStep?: number;
    zoomAdjustFactor?: number;
    zoomAdjustWheelFactor?: number;

    /**
     * Set to `true` to enable pan mode programatically
     */
    enablePanInput?: boolean;

    /**
     * Enable zoom input mode
     */
    enableZoomInput?: boolean;

    handleEvent?: (type: string, detail: any) => void;

    willRequest?: (
        url: string,
        requestInfo: { resourceType: string }
    ) => void | false | RequestInit;
    willClose?: () => Promise<boolean>;
    willRevert?: () => Promise<boolean>;
    willProcessImage?: () => Promise<boolean>;
    willRenderCanvas?: (
        shapes: {
            decorationShapes: Shape[];
            annotationShapes: Shape[];
            interfaceShapes: Shape[];
            frameShapes: Shape;
        },
        state: {
            annotationShapesDirty: boolean;
            backgroundColor: number[];
            blendShapesDirty: boolean;
            decorationShapesDirty: boolean;
            foregroundColor: number[];
            frameShapesDirty: boolean;
            images: {
                backgroundColor: number[];
                colorMatrix: number[];
                convolutionMatrix: number[];
                data: ImageBitmap | ImageData;
                gamma: number;
                opacity: number;
                origin: Vector;
                resize: number;
                rotation: { x: number; y: number; z: number };
                scale: number;
                size: Size;
                translation: Vector;
                vignette: number;
            };
            isInteracting: boolean;
            isInteractingFraction: number;
            lineColor: number[];
            opacity: number;
            rootRect: Rect;
            rotation: { x: number; y: number; z: number };
            scale: number;
            selectionRect: Rect;
            size: Size;
            stageRect: Rect;
            utilVisibility: {
                annotate: number;
                crop: number;
                decorate: number;
                filter: number;
                finetune: number;
                frame: number;
                redact: number;
                resize: number;
            };
        }
    ) => {
        decorationShapes: Shape[];
        annotationShapes: Shape[];
        interfaceShapes: Shape[];
    };
    willSetHistoryInitialState?: (initialState: any) => any;
    willRenderToolbar?: (nodes: PinturaNode[], env: any, redraw: () => void) => PinturaNode[];
    beforeSelectShape?: (current: Shape | undefined, target: Shape) => boolean;
    beforeDeselectShape?: (current: Shape, target: Shape | undefined) => boolean;
    beforeAddShape?: (shape: Shape) => boolean;
    beforeRemoveShape?: (shape: Shape) => boolean;
    beforeUpdateShape?: (shape: Shape, props: any, context: Rect) => Shape;
    willRenderShapeControls?: (nodes: PinturaNode[], shapeId: string) => PinturaNode[];
    willRenderShapeTextControls?: (nodes: PinturaNode[], shapeId: string) => PinturaNode[];
    willRenderShapePresetToolbar?: (
        nodes: PinturaNode[],
        addPreset: (sticker: Sticker) => void,
        env: any,
        redraw: () => void
    ) => PinturaNode[];

    /**
     * @deprecated Use `willRequest` instead
     */
    willRequestResource?: (url: string) => boolean;
}

export interface PinturaEditorOptions
    extends PinturaEditorBaseOptions,
        PinturaEditorImageOptions,
        AnnotatePluginOptions,
        CropPluginOptions,
        DecoratePluginOptions,
        FilterPluginOptions,
        FinetunePluginOptions,
        StickerPluginOptions,
        RetouchPluginOptions,
        FillPluginOptions,
        ResizePluginOptions,
        TrimPluginOptions {
    locale: any;
    imageReader: any;
    imageWriter?: any;
    imageOrienter?: any;
    imageScrambler?: any;
    imageRedactionRendering?: 'pixelated' | 'auto';
}

export interface PinturaEditorDefaultOptions
    extends PinturaEditorBaseOptions,
        PinturaEditorImageOptions,
        AnnotatePluginOptions,
        CropPluginOptions,
        DecoratePluginOptions,
        FilterPluginOptions,
        FinetunePluginOptions,
        StickerPluginOptions,
        RetouchPluginOptions,
        ResizePluginOptions,
        FillPluginOptions {
    locale?: any;
    imageReader?: any;
    imageWriter?: any;
    imageOrienter?: any;
}

export interface PinturaEditorHeadlessOptions extends PinturaEditorImageOptions {
    imageReader?: any;
    imageWriter?: any;
    imageScrambler?: any;
    shapePreprocessor?: any;
}

export interface PinturaEditor
    extends PinturaEditorMethods,
        PinturaEditorOptions,
        PinturaEditorOptionsReadonly,
        PinturaEditorImageOptionsReadonly {}

export interface PinturaEditorModalOptions {
    preventZoomViewport?: boolean;
    preventScrollBodyIfNeeded?: boolean;
    preventFooterOverlapIfNeeded?: boolean;
    enableAutoHide?: boolean;
    enableAutoDestroy?: boolean;
    readonly modal?: HTMLElement;
}

export interface PinturaEditorModal extends PinturaEditor, PinturaEditorModalOptions {
    show: () => void;
    hide: () => void;
}

export interface PinturaReadState {
    index: number;
    task: string;
    taskLengthComputable: boolean;
    taskProgress: number;
    timeStamp: number;
    error?: unknown;
}

export interface PinturaWriteState {
    index: number;
    task: string;
    taskLengthComputable: boolean;
    taskProgress: number;
    timeStamp: number;
    error?: unknown;
}

// Default image reader and writer
export interface PinturaDefaultImageReaderResult {
    readonly src: ImageSource;
    readonly dest: File;
    readonly size: Size;
    readonly duration: number;
}

export interface PinturaDefaultImageWriterResult {
    readonly src: ImageSource;
    readonly dest: File;
    readonly imageState: PinturaImageState;
    readonly store: any;
}

export interface PinturaDefaultImageWriterStoreState {
    readonly src: ImageSource;
    readonly dest: File;
    readonly imageState: PinturaImageState;
}

export interface PinturaTargetSize {
    width?: number;
    height?: number;
    fit?: 'contain' | 'cover' | 'force';
    upscale?: boolean;
}

export interface PinturaDefaultImageReaderOptions {
    orientImage?: boolean;
    outputProps?: string[];
    request?: {
        headers?: { [key: string]: string };
        credentials?: string;
    };
    preprocessImageFile?: (file: File, options: any, onprogress: ProgressCallback) => Promise<File>;
}

export type PinturaStoreField = [string, string] | [string, Blob | File, string];

export interface PinturaDefaultImageWriterOptions {
    canvasMemoryLimit?: number;
    orientImage?: boolean;
    copyImageHead?: boolean;
    mimeType?: string;
    quality?: number;
    format?: 'file' | 'imageData' | 'canvas';
    renameFile?: (file: File) => string;
    targetSize?: PinturaTargetSize;
    imageDataResizer?: (imageData: ImageData, width: number, height: number) => Promise<ImageData>;
    store?:
        | string
        | {
              url: string;
              dataset?: (state: PinturaDefaultImageWriterStoreState) => PinturaStoreField[];
              credentials?: string;
              headers?: { [key: string]: string };
          }
        | ((
              state: PinturaDefaultImageWriterStoreState,
              options: any,
              onprogress: ProgressCallback
          ) => Promise<any>);
    outputProps?: string[];
    preprocessImageSource?: (
        imageSource: Blob | File,
        options: any,
        onprogress: ProgressCallback
    ) => Promise<Blob | File>;
    preprocessImageState?: (
        imageState: PinturaImageState,
        options: any,
        onprogress: ProgressCallback
    ) => Promise<any>;
    postprocessImageData?: (
        imageData: any,
        options: any,
        onprogress: ProgressCallback
    ) => Promise<ImageData>;

    postprocessImageBlob?: (
        output: {
            blob: Blob;
            imageData: ImageData;
            src: File;
        },
        options: any,
        onprogress: ProgressCallback
    ) => Promise<ImageData>;
}

export interface PinturaDefaultImageScramblerOptions {
    dataSizeScalar?: number;
    scrambleAmount?: number;
    backgroundColor?: number[];
    blurAmount?: number;
}

export interface PinturaImageOrienter {
    read: (file: Blob | File, onprogress?: ProgressCallback) => Promise<number>;
    apply: (imageData: ImageData, orientation: number) => ImageData;
}

// exports
export const setPlugins: (...plugins: any[]) => void;

export const getEditorDefaults: (
    options?: PinturaEditorDefaultOptions
) => PinturaEditorDefaultOptions;

export const appendEditor: (
    target: HTMLElement | string,
    options?: PinturaEditorOptions
) => PinturaEditor;

export const appendDefaultEditor: (
    target: HTMLElement | string,
    options?: PinturaEditorDefaultOptions
) => PinturaEditor;

export const appendEditors: (
    target: HTMLElement | string,
    options?: PinturaEditorOptions
) => PinturaEditor[];

export const appendDefaultEditors: (
    target: HTMLElement | string,
    options?: PinturaEditorDefaultOptions
) => PinturaEditor[];

export const overlayEditor: (
    target: HTMLElement | string,
    options?: PinturaEditorOptions
) => PinturaEditor;

export const overlayDefaultEditor: (
    target: HTMLElement | string,
    options?: PinturaEditorDefaultOptions
) => PinturaEditor;

export const openEditor: (options: PinturaEditorOptions) => PinturaEditorModal;

export const openDefaultEditor: (options: PinturaEditorDefaultOptions) => PinturaEditorModal;

export const defineCustomElements: (options?: PinturaEditorOptions) => Promise<PinturaEditor>;

export const defineDefaultCustomElements: (
    options?: PinturaEditorDefaultOptions
) => Promise<PinturaEditor>;

export const processImage: (
    src: ImageSource,
    options: PinturaEditorHeadlessOptions
) => Promise<PinturaDefaultImageWriterResult>;

export const processDefaultImage: (
    src: ImageSource,
    options: PinturaEditorHeadlessOptions
) => Promise<PinturaDefaultImageWriterResult>;

export const createDefaultImageReader: (options?: PinturaDefaultImageReaderOptions) => any[];

export const createDefaultImageWriter: (options?: PinturaDefaultImageWriterOptions) => any[];

type WriterFunction = (
    src: File,
    imageState: PinturaImageState,
    genericOptions: any
) => unknown[] | undefined;

export const createDefaultMediaWriter: (
    options?: any,
    ...writers: WriterFunction[] | any[][]
) => any;

export const createDefaultImageOrienter: () => PinturaImageOrienter;

export const createDefaultImageScrambler: (
    options?: PinturaDefaultImageScramblerOptions
) => (imageData: ImageData | ImageBitmap) => HTMLCanvasElement;

export const createDefaultShapePreprocessor: () => any;

export const createDefaultFrameStyles: () => {
    [key: string]: (shape: Shape, options?: { isPreview: boolean }) => Shape[];
};

export const createDefaultLineEndStyles: () => {
    [key: string]: (shape: Shape, options?: { isPreview: boolean }) => Shape[];
};

export const createFrameStyleProcessor: (styles: any) => any;

export const createLineEndProcessor: (styles: any) => any;

export const imageStateToCanvas: (
    src: HTMLCanvasElement | HTMLVideoElement | HTMLImageElement,
    imageState: PinturaImageState,
    options: {
        targetCanvas?: HTMLCanvasElement;
        targetSize?: PinturaTargetSize;
        disableDraw?: boolean;
    }
) => {
    canvas: HTMLCanvasElement;
    redraw: () => void;
};

// node tree helpers
export function createNode(
    name: PinturaNodeType,
    id: string,
    props: PinturaNodeOptions | undefined,
    children: PinturaNode[]
): PinturaNode;

export function createNode(name: PinturaNodeType, id: string): PinturaNode;

export function createNode(name: PinturaNodeType, id: string, children: PinturaNode[]): PinturaNode;

export function createNode(
    name: PinturaNodeType,
    id: string,
    props: PinturaNodeOptions
): PinturaNode;

export function findNode(
    id: string,
    haystack: PinturaNode | PinturaNode[]
): undefined | PinturaNode;
export function updateNode(node: PinturaNode, props: { [key: string]: unknown }): void;
export function appendNode(node: PinturaNode, haystack: PinturaNode | PinturaNode[]): void;
export function removeNode(id: string): PinturaNode[];
export function insertNodeBefore(
    node: PinturaNode,
    targetId: string,
    haystack: PinturaNode | PinturaNode[]
): void;
export function insertNodeAfter(
    node: PinturaNode,
    targetId: string,
    haystack: PinturaNode | PinturaNode[]
): void;

type SelectionDrawMode = 'add' | 'subtract' | 'new';

interface SelectionShape {
    drawMode?: SelectionDrawMode;
}

interface SelectionRectangle extends SelectionShape {
    x: number | Percentage;
    y: number | Percentage;
    width: number | Percentage;
    height: number | Percentage;
}

interface SelectionPath extends SelectionShape {
    points: Vector[];
    pathClose: false;
}

interface SelectionLassoo extends SelectionShape {
    points: Vector[];
    pathClose: true;
}

interface SelectionEllipse extends SelectionShape {
    x: number | Percentage;
    y: number | Percentage;
    rx: number | Percentage;
    ry: number | Percentage;
}

type SelectionShapes = SelectionRectangle | SelectionPath | SelectionEllipse;

// utils
export const selectionToMask: (
    selection: SelectionShapes[],
    imageSize: Size,
    imageState: PinturaImageState,
    options?: {
        format?: 'canvas' | 'blob';
        backgroundColor?: number[];
        scope?: 'mask' | 'image';
        padding?: number /** defaults to 0 */;
        maxSize?: Size /** defaults to imageSize */;
        precision?: number /** defaults to 7, lower is more precise but slower */;
    }
) => Promise<{ rect: Rect; canvas: HTMLCanvasElement; blob: Blob | undefined }>;

export const createRetouchShape: (
    imageFile: Blob | File,
    imageSize: Size,
    imageState: PinturaImageState,
    selection: any,
    inpaint: (
        imageOuptut: Blob | HTMLCanvasElement,
        maskOuptut: Blob | HTMLCanvasElement,
        options: { shape: Shape; controller: AbortController }
    ) => Promise<void>,
    options?: {
        retouches?: Shape[] /** current retouch shapes */;
        maxSize?: Size /** limit mask to this size */;
        padding?: number /** extra padding around mask area, defaults to 15 */;
        didCreateDraft?: (
            shape: Shape,
            options?: { selection: any }
        ) => undefined /** hook for ui updates */;

        // resize mask to this size if is bigger
        targetSize?: Size;

        // image format (png or empty for use input)
        mimeType?: string;

        // called before creating mask rect
        beforeCreateMaskCanvas: (mask: Rect) => Rect;

        // background and foreground color of mask, defaults to false
        alphaMask: boolean;

        // mask format, defaults to blob
        maskFormat?: 'blob' | 'canvas';

        // image format, defaults to blob
        imageFormat?: 'blob' | 'canvas';
    }
) => Shape;

export const getUniqueId: () => string;
export const supportsWebGL: () => boolean;
export const degToRad: (deg: number) => number;
export const naturalAspectRatioToNumber: (
    aspectRatio: string | number | undefined
) => number | false | undefined;
export const colorStringToColorArray: (Color: string) => Color;
export const legacyDataToImageState: (
    editor: any,
    imageSize: Size,
    data: any
) => PinturaImageOptions;
export const dispatchEditorEvents: (
    editor: PinturaEditor,
    element: HTMLElement,
    options?: { prefix?: string }
) => any[];
export const blobToFile: (blob: Blob | File, filename: string, mimetype?: string) => File;
export const isSupported: () => boolean;

// shape helpers
export const shapeGetLevel: (
    shapeState: { flipX: undefined | boolean; flipY: undefined | boolean; rotation: number },
    imageState: { flipX: boolean; flipY: boolean; rotation: number }
) => { flipX: boolean; flipY: boolean; rotation: number };
export const shapeGetLength: (shape: Shape) => undefined | number;
export const shapeGetCenter: (shape: Shape) => Vector;

export const getShapeById: (shapeArray: Shape[], shapeId: string) => Shape | undefined;
export const updateShapeById: (
    shapeArray: Shape[],
    shapeId: string,
    updater: (shape: Shape) => Shape
) => Shape[];

// locale
export const locale_en_gb: LocaleCollection;

//
// markup editor
//
export interface MarkupEditorToolStyleDefaults {
    sharpie: [Shape, ShapeToolOptions];
    line: [Shape, ShapeToolOptions];
    arrow: [Shape, ShapeToolOptions];
    rectangle: [Shape, ShapeToolOptions];
    ellipse: [Shape, ShapeToolOptions];
    text: [Shape, ShapeToolOptions];
    [custom: string]: [Shape, ShapeToolOptions];
}

export interface MarkupEditorShapeControlOptions {
    component?: any;
    options?: any;
    items?: any;
}

export interface MarkupEditorShapeStyleControlOptions {
    [key: string]: MarkupEditorShapeControlOptions;
}

export interface MarkupEditorShapeStyleControlDefaults {
    backgroundColor: undefined | ShapeControl;
    strokeColor: undefined | ShapeControl;
    strokeWidth: undefined | ShapeControl;
    lineStart: undefined | ShapeControl;
    lineEnd: undefined | ShapeControl;
    color: undefined | ShapeControl;
    fontFamily: undefined | ShapeControl;
    fontStyle_fontWeight: undefined | ShapeControl;
    fontSize: undefined | ShapeControl;
    textAlign: undefined | ShapeControl;
    lineHeight: undefined | ShapeControl;

    // custom
    [key: string]:
        | undefined
        | ShapeControl
        | {
              component?: any;
              options?: any;
              item?: any;
          };
}

export type ToolbarItem =
    | string
    | [string, { disabled?: boolean; icon: string }]
    | [string, LocaleString, { disabled?: boolean; icon: string }];

/**
 * Create tools available in the markup editor
 */
export const createMarkupEditorToolbar: (tools?: ToolbarItem[]) => [string, LocaleString, any][];

/**
 * Create default shape styles for each tool, optionally add custom shape styles
 */
export const createMarkupEditorToolStyles: (toolStyles?: {
    [key: string]: [Shape, ShapeToolOptions];
}) => MarkupEditorToolStyleDefaults;

/**
 * Create a custom tool style based on one of the existing types
 */
export const createMarkupEditorToolStyle: (
    type: 'path' | 'rectangle' | 'ellipse' | 'line' | 'text',
    shape?: Shape,
    options?: ShapeToolOptions
) => [Shape, ShapeToolOptions];

/**
 * Create default shape style controls
 */
export const createMarkupEditorShapeStyleControls: (
    shapeControlOptions?: ShapeControlOptions
) => MarkupEditorShapeStyleControlDefaults;

export const createDefaultColorOptions: () => ColorPalette;
export const createDefaultFontSizeOptions: () => number[];
export const createDefaultFontScaleOptions: () => SizeCategories;
export const createDefaultLineHeightOptions: () => number[];
export const createDefaultLineHeightScaleOptions: () => SizeCategories;
export const createDefaultStrokeWidthOptions: () => number[];
export const createDefaultStrokeScaleOptions: () => SizeCategories;
export const createDefaultLineEndStyleOptions: () => LineEndStyle[];
export const createDefaultFontFamilyOptions: () => [string, string][];
export const createDefaultFontStyleOptions: () => [string, string][];
export const createDefaultTextAlignOptions: () => TextAlign[];

export const createMarkupEditorColorOptions: (colors: ColorPalette) => ShapeColorOption[];
export const createMarkupEditorFontSizeOptions: (sizes: number[]) => ShapeSizeOption[];
export const createMarkupEditorFontScaleOptions: (sizes: SizeCategories) => ShapeSizeOption[];
export const createMarkupEditorLineHeightOptions: (sizes: number[]) => ShapeSizeOption[];
export const createMarkupEditorLineHeightScaleOptions: (sizes: SizeCategories) => ShapeSizeOption[];
export const createMarkupEditorStrokeWidthOptions: (widths: number[]) => ShapeSizeOption[];
export const createMarkupEditorStrokeScaleOptions: (sizes: SizeCategories) => ShapeSizeOption[];
export const createMarkupEditorFontFamilyOptions: (
    families: [string, string][]
) => ShapeFontFamilyOption[];
export const createMarkupEditorFontStyleOptions: (
    styles: [string, string][]
) => ShapeFontStyleOption[];
export const createMarkupEditorLineEndStyleOptions: (
    styles: LineEndStyle[]
) => [LineEndStyle, string][];

export const createMarkupEditorBackgroundColorControl: (
    colors: ShapeColorOption[],
    options?: {
        enablePicker?: boolean;
        enableOpacity?: boolean;
        enableInput?: boolean;
        enablePresets?: boolean;
    }
) => ShapeControl;
export const createMarkupEditorStrokeColorControl: (
    colors: ShapeColorOption[],
    options?: {
        defaultStrokeWidth: number | string;
        enablePicker?: boolean;
        enableOpacity?: boolean;
        enableInput?: boolean;
        enablePresets?: boolean;
    }
) => ShapeControl;
export const createMarkupEditorStrokeWidthControl: (widths: ShapeSizeOption[]) => ShapeControl;
export const createMarkupEditorLineStartStyleControl: (
    styles: [LineEndStyle, string][]
) => ShapeControl;
export const createMarkupEditorLineEndStyleControl: (
    styles: [LineEndStyle, string][]
) => ShapeControl;
export const createMarkupEditorFontColorControl: (
    colors: ShapeColorOption[],
    options?: {
        enablePicker?: boolean;
        enableOpacity?: boolean;
        enableInput?: boolean;
        enablePresets?: boolean;
    }
) => ShapeControl;
export const createMarkupEditorFontFamilyControl: (
    fontFamilies: [string, string][],
    options?: {
        defaultKey: string | undefined;
    }
) => ShapeControl;
export const createMarkupEditorFontStyleControl: (fontStyles: [string, string][]) => ShapeControl;
export const createMarkupEditorFontSizeControl: (
    sizes: ShapeSizeOption[],
    options?: {
        defaultKey?: string;
        defaultValue?: string | number;
        enableInput?: boolean;
    }
) => ShapeControl;
export const createMarkupEditorTextAlignControl: (textAlignments: TextAlign[]) => ShapeControl;
export const createMarkupEditorLineHeightControl: (
    lineHeights: [number, string][],
    options?: {
        defaultKey?: string;
        defaultValue?: string | number;
        enableInput?: boolean;
    }
) => ShapeControl;

export const createMarkupEditorOptionsControl: (items: unknown[], options: any) => ShapeControl;

export const markup_editor_defaults: {
    markupEditorToolbar: [string, LocaleString, any][];
    markupEditorToolStyles: MarkupEditorToolStyleDefaults;
    markupEditorShapeStyleControls: MarkupEditorShapeStyleControlDefaults;
};

export const createMarkupEditorBrushSizeControl: (items: unknown[]) => ShapeControl;

export const createMarkupEditorSelectionModeControl: (options?: {
    hideLabel: boolean;
}) => ShapeControl;

export const createMarkupEditorSelectionToolStyles: (
    action: string,
    options?: { tools: string[] }
) => any;

export const createMarkupEditorSelectionTools: (
    action: string,
    options?: { tools: string[] }
) => any;

export const markup_editor_locale_en_gb: LocaleCollection;

//
// plugins
//
export interface PinturaUtilPlugin {
    util: [string, any];
}

export const plugin_annotate: PinturaUtilPlugin;
export const plugin_crop: PinturaUtilPlugin;
export const plugin_decorate: PinturaUtilPlugin;
export const plugin_filter: PinturaUtilPlugin;
export const plugin_finetune: PinturaUtilPlugin;
export const plugin_resize: PinturaUtilPlugin;
export const plugin_sticker: PinturaUtilPlugin;
export const plugin_redact: PinturaUtilPlugin;
export const plugin_frame: PinturaUtilPlugin;
export const plugin_fill: PinturaUtilPlugin;
export const plugin_retouch: PinturaUtilPlugin;

export const plugin_annotate_locale_en_gb: LocaleCollection;
export const plugin_crop_locale_en_gb: LocaleCollection;
export const plugin_decorate_locale_en_gb: LocaleCollection;
export const plugin_filter_locale_en_gb: LocaleCollection;
export const plugin_finetune_locale_en_gb: LocaleCollection;
export const plugin_resize_locale_en_gb: LocaleCollection;
export const plugin_sticker_locale_en_gb: LocaleCollection;
export const plugin_redact_locale_en_gb: LocaleCollection;
export const plugin_frame_locale_en_gb: LocaleCollection;
export const plugin_fill_locale_en_gb: LocaleCollection;
export const plugin_retouch_locale_en_gb: LocaleCollection;

export const plugin_frame_defaults: FramePluginOptions;
export const plugin_filter_defaults: FilterPluginOptions;
export const plugin_finetune_defaults: FinetunePluginOptions;

export const effectBrightness: Effect;
export const effectContrast: Effect;
export const effectSaturation: Effect;
export const effectExposure: Effect;
export const effectGamma: Effect;
export const effectVignette: Effect;
export const effectClarity: Effect;
export const effectTemperature: Effect;

export const filterPastel: Filter;
export const filterChrome: Filter;
export const filterFade: Filter;
export const filterWarm: Filter;
export const filterCold: Filter;
export const filterInvert: Filter;
export const filterMonoDefault: Filter;
export const filterMonoNoir: Filter;
export const filterMonoWash: Filter;
export const filterMonoStark: Filter;
export const filterSepiaDefault: Filter;
export const filterSepiaBlues: Filter;
export const filterSepiaRust: Filter;
export const filterSepiaColor: Filter;

export const frameSolidSharp: Frame;
export const frameSolidRound: Frame;
export const frameLineSingle: Frame;
export const frameLineMultiple: Frame;
export const frameEdgeSeparate: Frame;
export const frameEdgeCross: Frame;
export const frameEdgeOverlap: Frame;
export const frameHook: Frame;
export const framePolaroid: Frame;
