import React from "react";

export default ({times, children}) => {
    const icons = [];

    for (let i = 0; i < times; i++) {
        icons.push(<span key={i}>{children}</span>)
    }

    return  icons
}
