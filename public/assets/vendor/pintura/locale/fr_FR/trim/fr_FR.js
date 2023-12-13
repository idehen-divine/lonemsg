export default {
    trimLabel: 'Découper',
    trimIcon: `<g stroke-width=".125em" stroke="currentColor" fill="none"><path d=" M1 3 v18 M5 3 v2 M9 3 v2 M5 18 v2 M9 18 v2 M1 3 h12 M1 6 h10 M1 18 h9 M1 21 h8 M14 0 l-4 24 M18 3 h5 M17.5 6 h6 M15.5 18 h7 M15 21 h8 M19 3 v2 M15 18 v2 M19 18 v2 M23 3 v18"/></g>`,

    trimLabelPlay: 'Lire',
    trimLabelPause: 'Pause',

    trimLabelMute: 'Couper le son',
    trimLabelUnmute: 'Réactiver',

    trimLabelSplit: 'Diviser',
    trimLabelMerge: 'Fusionner',

    trimIconButtonMute:
        '<g stroke-width=".125em" stroke="currentColor"><polygon fill="currentColor" points="2 16 2 8 8 8 15 1 15 23 8 16"/><path d="M19.3781212,15.2166107 C20.3621122,14.4879168 21,13.3184517 21,12 C21,10.6815483 20.3621122,9.51208318 19.3781212,8.78338927"/></g>',
    trimIconButtonUnmute:
        '<g stroke-width=".125em" stroke="currentColor"><polygon fill="currentColor" points="2 16 2 8 3 8 15 20 15 23 8 16"/><polygon fill="currentColor" points="8 8 15 1 15 15"/><line x1="1" y1="1" x2="23" y2="23"/></g>',

    trimIconButtonPlay: '<polygon fill="currentColor" points="7 3, 21 12, 7 21"/>',
    trimIconButtonPause:
        '<g fill="currentColor"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></g>',

    trimIconButtonSplit: `<g stroke="currentColor" stroke-width=".125em">
    <path d="M12 4 V20"/>
    <path fill="currentColor" d="M6 8 L6 16 L2 12 Z M18 8 L22 12 L18 16 Z"/>
    </g>`,
    trimIconButtonMerge: `<g stroke="currentColor" stroke-width=".125em">
    <path d="M1 4 V20 M23 4 V20"/>
    <path fill="currentColor" d="M6 8 L10 12 L6 16 Z M18 8 L14 12 L18 16 Z"/>
    </g>`,

    // overrides, replace image with media
    statusLabelLoadImage: (state) => {
        if (!state || !state.task) return `Attente de média`;
        if (state.error) {
            if (state.error.code === 'IMAGE_TOO_SMALL') {
                return 'La taille minimale est de {minWidth} &times; {minHeight}';
            } else if (state.error.code === 'VIDEO_TOO_SHORT') {
                const unit = state.error.metadata.minDuration === 1 ? 'seconde' : 'secondes';
                return `La durée minimale de la vidéo est de {minDuration} ${unit}`;
            } else {
                return 'Erreur de chargement du média';
            }
        }
        if (state.task === 'blob-to-bitmap') return `Préparer du média&hellip;`;
        return `Chargement de media&hellip;`;
    },

    // processing status message
    statusLabelProcessImage: (state) => {
        if (!state || !state.task) return undefined;
        if (state.task === 'store') {
            if (state.error) return `Erreur de transfert de média`;
            return `Transfert de média&hellip;`;
        }
        if (state.error) return `Erreur de traitement de média`;
        return `Traitement de média&hellip;`;
    },

    cropLabelCropBoundaryEdge: `Limite de média`,
};
