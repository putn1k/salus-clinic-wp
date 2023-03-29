const dataBaseNode = document.querySelector( '.price-list__groups' );
let PRICE_DB = [];

const processDB = () => {
  return new Promise( ( resolve ) => {
    const tr = dataBaseNode.querySelectorAll( '.price-list__table tr' );
    tr.forEach( item => {
      const proc = item.querySelector( 'tr>td:first-of-type' ).textContent;
      const price = item.querySelector( 'tr>td:last-of-type' ).textContent;
      PRICE_DB.push( {
        name: proc,
        price: price
      } );
    } );
    resolve();
  } );
};

function createDataBase() {
  if ( !dataBaseNode ) return;
  return processDB();
}

export {
  PRICE_DB,
  createDataBase
};
