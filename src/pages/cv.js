import React from "react";
import {Helmet} from "react-helmet";
import CVImage from "../images/CVimage.png"
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faEnvelopeOpen, faMobile, faMapMarkerAlt} from "@fortawesome/pro-light-svg-icons";

export default function CV() {
  return  <>
    <Helmet>
      <meta charSet="utf-8" />
      <title>Roy Segall CV</title>
      <link rel="canonical" href="https://www.segall.io" />
    </Helmet>

    <header className="blue-background text-center shadow-xl">
      <div className="py-4">
        <img src={CVImage} className="ml-auto mr-auto rounded-full h-40 w-40 border border-white shadow-xl" />
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

    <main className="flex justify-center pt-5">
      <section className="w-11/12">
        <p className="text-xl font-extralight leading-relaxed">
          Enthusiastic, self-learned, highly motivated, love to explore new technologies, contributing to open-source
          projects, speak at local meetups, makes the best Tahini you can imagine, and an amateur chef.</p>
      </section>
    </main>

  </>
}
