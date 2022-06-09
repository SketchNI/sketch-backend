class InjectStylesInBody {
    apply(compiler) {
        compiler.hooks.compilation.tap('inject-styles-in-body', (compilation) => {
            if (!compilation.hooks.htmlWebpackPluginAlterAssetTags) return;
            compilation.hooks.htmlWebpackPluginAlterAssetTags.tap('inject-styles-in-body', function(pluginArgs) {
                const { head, body } = pluginArgs;
                head
                    .filter(asset => asset.tagName === 'link' && asset.attributes && asset.attributes.rel === 'stylesheet')
                    .forEach(asset => {
                        head.splice(head.indexOf(asset), 1);
                        body.push(asset);
                    });
            });
        });
    }
}

module.exports = {
    configureWebpack: {
        node: { global: false },
        devtool: 'source-map'
    },
    chainWebpack: config => {
        // ...
        config
            .plugin('inject-styles-in-body')
            .use(InjectStylesInBody)
        ;
        // ...
    }
    // ...
};
