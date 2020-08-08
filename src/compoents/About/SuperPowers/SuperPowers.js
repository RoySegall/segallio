import React from "react";
import SuperPowerList from "./SuperPowerList";
import SuperPower from "./SuperPower";

export default () => {
    return <section className="filler about-me-superpowers">
        <h2 className="about-me-superpowers-h2">Super powers</h2>
        <ul className="about-me-superpowers-ul">
            {SuperPowerList.map(superpower => <SuperPower superpower={superpower} />)}
        </ul>
    </section>
};
