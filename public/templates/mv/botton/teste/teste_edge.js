/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
            'Oswald, sans-serif': ''        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'Pasted2',
                            type: 'image',
                            rect: ['0px', '0px', '198px', '59px', 'auto', 'auto'],
                            clip: 'rect(0px 198px 59px 0px)',
                            cursor: 'pointer',
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"Pasted2.svg",'0px','0px']
                        },
                        {
                            id: 'Pasted3',
                            type: 'image',
                            rect: ['139px', '0px', '59px', '59px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"Pasted3.svg",'0px','0px']
                        },
                        {
                            id: 'Text',
                            type: 'text',
                            rect: ['19px', '16px', 'auto', 'auto', 'auto', 'auto'],
                            cursor: 'pointer',
                            text: "<p style=\"margin: 0px;\">​Telefones Úteis</p>",
                            font: ['Oswald, sans-serif', [19, "px"], "rgba(255,255,255,1.00)", "normal", "none", "", "break-word", "nowrap"]
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: [undefined, undefined, '198px', '59px'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,1)"]
                        }
                    }
                },
                timeline: {
                    duration: 500,
                    autoPlay: true,
                    labels: {
                        "ida": 0,
                        "volta": 250
                    },
                    data: [
                        [
                            "eid21",
                            "left",
                            250,
                            0,
                            "easeOutQuad",
                            "${Text}",
                            '19px',
                            '19px'
                        ],
                        [
                            "eid26",
                            "top",
                            250,
                            0,
                            "easeOutQuad",
                            "${Pasted2}",
                            '0px',
                            '0px'
                        ],
                        [
                            "eid5",
                            "clip",
                            0,
                            250,
                            "easeOutQuad",
                            "${Pasted2}",
                            [0,198,59,169],
                            [0,198,59,0],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ],
                        [
                            "eid6",
                            "clip",
                            250,
                            250,
                            "easeOutQuad",
                            "${Pasted2}",
                            [0,198,59,0],
                            [0,198,59,169],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ],
                        [
                            "eid12",
                            "opacity",
                            0,
                            45,
                            "easeOutQuad",
                            "${Pasted2}",
                            '0',
                            '1'
                        ],
                        [
                            "eid13",
                            "opacity",
                            45,
                            0,
                            "linear",
                            "${Pasted2}",
                            '1',
                            '1'
                        ],
                        [
                            "eid15",
                            "opacity",
                            250,
                            0,
                            "linear",
                            "${Pasted2}",
                            '1',
                            '1'
                        ],
                        [
                            "eid16",
                            "opacity",
                            455,
                            45,
                            "easeOutQuad",
                            "${Pasted2}",
                            '1',
                            '0'
                        ],
                        [
                            "eid25",
                            "top",
                            250,
                            0,
                            "easeOutQuad",
                            "${Text}",
                            '16px',
                            '16px'
                        ],
                        [
                            "eid23",
                            "left",
                            250,
                            0,
                            "easeOutQuad",
                            "${Pasted2}",
                            '0px',
                            '0px'
                        ],
                        [
                            "eid7",
                            "clip",
                            0,
                            250,
                            "easeOutQuad",
                            "${Text}",
                            [0,198,59,169],
                            [0,198,59,0],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ],
                        [
                            "eid8",
                            "clip",
                            250,
                            250,
                            "easeOutQuad",
                            "${Text}",
                            [0,198,59,0],
                            [0,198,59,169],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("teste_edgeActions.js");
})("EDGE-88788836");
