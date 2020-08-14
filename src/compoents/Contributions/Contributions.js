import React, {Component} from "react"
import "./Contributions.scss";
import {Technologies} from "./Technologies";
import {Repositories} from "./Repositories";

export class Contributions extends Component {

    constructor(props) {
        super(props);

        this.state = {
            selectedTechnology: null
        };
    }

    setTechnology = (event) => {
        const technology = event.currentTarget.getAttribute('data-technology');
        const {selectedTechnology} = this.state;

        if (selectedTechnology && selectedTechnology === technology) {
            this.setState({selectedTechnology: null})
            return;
        }

        this.setState({selectedTechnology: technology})
    }

    render() {
        return <div className="w-screen contributions" id="contributions">

            <section className="main w-screen text-center">
                <h2 className="text-4xl xs:text-2xl font-bold text-white pb-4 title-for-text">Contributions</h2>

                <div className="grid-width">
                    <Technologies selectedTechnology={this.state.selectedTechnology} setTechnologyCallback={this.setTechnology}/>
                    <Repositories />
                </div>

            </section>
        </div>
    }
}

