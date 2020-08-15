import React from "react"
import "./tailwind.css";
import "./index.scss";
import {About} from "../compoents/About/About";
import Introduction from "../compoents/Introduction/Introduction";
import Jobs from "../compoents/Jobs/Jobs";
import Blogs from "../compoents/Blogs/Blogs";
import Contributions from "../compoents/Contributions/Contributions";
import {Footer} from "../compoents/Footer/Footer";
import Map from "../compoents/Map/Map";

export default function Home() {
  return <>
    <Introduction/>
    <About/>
    <Jobs/>
    <Blogs/>
    <Contributions/>
    <Map />
    <Footer/>
  </>
}
