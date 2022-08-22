import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';

const registerHeroBlock = () => {
  wp.blocks.registerBlockType('trotzky22/hero-block', {
    title: 'Hero Block',
    icon: 'hammer',
    category: 'design',
    attributes: {
      title: {
        type: 'string'
      },
      text: {
        type: 'string'
      },
      image: {
        type: 'string',
        source: 'attribute',
        selector: 'img',
        attribute: 'src'
      },
      bottomShadow: {
        type: 'boolean'
      }
    },
    edit: ({ attributes, setAttributes }) => {
      return (
        <div {...useBlockProps()}>
          <TextControl
            label="Titel"
            value={attributes.title}
            onChange={(val) => setAttributes({ title: val })}
          />
        </div>
      );
      /* return (
        <div class="shadow-lg mb-5">
          <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
              <div class="col-10 col-sm-8 col-lg-6">
                <img src="http://arbeiterinnenstandpunkt.net/wp-content/uploads/2022/03/IMG_20220308_134439-1-890x550-1.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy" />
              </div>
              <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3"><TextControl
                  label='Titel'
                  value={attributes.title}
                  onChange={(val) => setAttributes({ title: val })}
                />Texte von 1918 bis 1945</h1>
                <p class="lead">
                  Donec nec orci elementum sapien hendrerit condimentum. Vivamus vehicula felis sit amet egestas cursus. Aliquam id suscipit quam. Phasellus in blandit tellus, nec ultricies metus. Fusce quam lectus, dictum at sagittis eu, accumsan eu massa. Nam turpis tellus, tempor eu turpis nec, semper aliquam nisl. Fusce pretium dui sem, tristique blandit odio varius sed. Nulla bibendum ac sapien sit amet sagittis.</p>
              </div>
            </div>
          </div>
        </div> 
      )*/
    },
    save: (props) => {
      return null;
    }
  });
  console.log("Hero");

};
export default registerHeroBlock;
