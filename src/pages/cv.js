import React from "react";
import {Helmet} from "react-helmet";
import CVImage from "../images/CVimage.png"
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faEnvelopeOpen, faMobile, faMapMarkerAlt} from "@fortawesome/pro-light-svg-icons";
import CvJobs from "../compoents/Jobs/CvJob";

export default function CV() {
  return  <>
    <Helmet>
      <meta charSet="utf-8" />
      <title>Roy Segall CV</title>
      <link rel="canonical" href="https://www.segall.io" />
    </Helmet>

    <header className="blue-background text-center shadow-xl">
      <div className="py-4">
        <img src={CVImage} className="ml-auto mr-auto rounded-full h-28 w-28 border border-white shadow-xl" />
      </div>

      <div>
        <h1 className="text-4xl text-white font-semibold pb-2">Roy Segall</h1>
        <h2 className="text-2xl text-white font-thin pb-4">Turn pizza into code and make the best Tahini you can imagine</h2>

        <p className="text-center text-xl text-white pb-2">
          <ul className="flex justify-center">
            <li className="pr-2"><FontAwesomeIcon icon={faEnvelopeOpen} /> <span className="underline">roy@segall.io</span></li>
            <li className="pr-2"><FontAwesomeIcon icon={faMobile} /> +972-054-6857077</li>
            <li className="pr-2"><FontAwesomeIcon icon={faMapMarkerAlt} /> Ramat-Gan, Israel</li>
          </ul>
        </p>
      </div>
    </header>

    <main className="w-11/12 m-auto">
      <p className="text-xl font-extralight leading-relaxed py-5">
        Enthusiastic, self-learned, highly motivated, love to explore new technologies, contributing to open-source
        projects, speak at local meetups, makes the best Tahini you can imagine, and an amateur chef.
      </p>

      <section className="cv-jobs pb-5">
        <h3 className="uppercase text-2xl font-semibold underline orange-color pb-5">Professional history</h3>

        <div className="grid grid-flow-col auto-cols-max">
          <div className="pr-10 flex">
            <div className="pr-2"><img src={CVImage} className="ml-auto mr-auto w-20 shadow-xl" /></div>
            <div className="flex flex-col">
              <span className="text-xl blue-color">Dreamed Diabetes</span>
              <span className="font-thin">2019 - Now</span>
              <span className="font-extralight">Developer</span>
            </div>

          </div>

          <div className="font-light">
            <p className="pb-2">Techonoliges: <u>React, React native, Django</u></p>

            <p className="">Dreamed Diabetes is a small startup which aims on helping with diabetes to get better treatment. I joined a small development team, which later on scaled up.</p>
          </div>
        </div>
      </section>

      <section>
        <h3 className="uppercase text-2xl font-semibold underline orange-color pb-5">Open Source Contributions</h3>

      </section>
      {/*<CvJobs />*/}
    </main>

  </>
}
