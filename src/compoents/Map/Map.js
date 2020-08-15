import React from "react";
import './map.scss';
import {Map, Marker, GoogleApiWrapper} from 'google-maps-react';
import places from "./places.yml"

const MapElement = (props) => <div className="w-screen m-auto map text-center" id="places">
    <h2 className="text-4xl font-bold pb-4 title-for-text">
        Places I visited
    </h2>

    <Map
        zoom={5}
        initialCenter={{
            lat: 44.313220,
            lng: 15.319482
        }}
        className="display-map"
        google={props.google}>

        {places.map((place, key) =>
            <Marker key={key} position={{lat: place.geo[0], lng: place.geo[1]}} />
        )}


    </Map>
</div>;

export default GoogleApiWrapper({
    apiKey: ('AIzaSyAjOSJxD8vnpZs8ve0rFhVBLcY3KmzN0zA')
})(MapElement)
