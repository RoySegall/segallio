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
import { Helmet } from "react-helmet"

export default function Home() {
  return <>
    <Helmet>
      <meta charSet="utf-8" />
      <title>Roy Segall</title>
      <link rel="canonical" href="https://www.segall.io" />
    </Helmet>
    <Introduction/>
    <About/>
    <Jobs/>
    <Blogs/>
    <Contributions/>
    <div className="mb-10 xs:mb-24">
      <Map />
    </div>
    <Footer/>
  </>
}
