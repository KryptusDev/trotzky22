const registerHeroBlock = () => {
  wp.blocks.registerBlockType('trotzky22/hero-block', {
    title: 'Hero Block',
    icon: 'hammer',
    category: 'design',
    attributes: {
        name: {type: 'string'},
    },
    edit: (props) => {
        return (
          <h1>test</h1>
        )
    },
    save: (props) => {
        return null;
    }
  });
  console.log("Hero");
  
};
export default registerHeroBlock;
