import React from "react";
import {Repository} from "./Repository";

const filterContributionsBySelectedTech = (contribution, selectedTechnology) => {
    if (selectedTechnology) {
        return contribution.frontmatter.technologies.indexOf(selectedTechnology) !== -1;
    }

    return true;
}

export const Repositories = ({contributions, selectedTechnology}) => <div className="text-left pt-4 grid-responsive">
    {
        contributions
            .filter((contribution) => filterContributionsBySelectedTech(contribution, selectedTechnology))
            .map((contribution, key) => <Repository contribution={contribution} key={key}/>)
    }
</div>
