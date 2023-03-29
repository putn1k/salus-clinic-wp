import {
  Options,
} from './options.js';

const contactsMapNode = document.querySelector( `#${Options.Map.Main.ID}` );

const createMap = ( options ) => {
  if ( !contactsMapNode ) return;

  ymaps.ready( initYmap );

  function initYmap() {
    const MAP = new ymaps.Map( contactsMapNode, {
      center: options.center,
      zoom: options.zoom,
    } );
    const ICON_OPTIONS = {
      iconLayout: 'default#image',
    };

    if ( options.customIcon ) {
      Object.assign( ICON_OPTIONS, options.customIconProperties );
    }

    const PLACEMARK = new ymaps.Placemark( options.center, null, ICON_OPTIONS );
    MAP.controls.remove( 'searchControl' ); // удаляем поиск
    MAP.controls.remove( 'trafficControl' ); // удаляем контроль трафика
    MAP.controls.remove( 'typeSelector' ); // удаляем тип
    MAP.controls.remove( 'fullscreenControl' ); // удаляем кнопку перехода в полноэкранный режим
    MAP.controls.remove( 'rulerControl' ); // удаляем линейку
    MAP.geoObjects.add( PLACEMARK );
    MAP.behaviors.disable( 'scrollZoom' );
  }

};

const mapObserverCb = ( entries ) => {
  entries.forEach( entry => {
    if ( entry.isIntersecting ) {
      createMap( Options.Map.Main );
    }
  } );
};

export const initMap = () => {
  contactsMapNode ? new IntersectionObserver( mapObserverCb, Options.Observer.Map ).observe( contactsMapNode ) : '';
};
