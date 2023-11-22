'use client';

import {useCallback, useMemo, useState} from "react";
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faChevronLeft, faChevronRight} from '@fortawesome/free-solid-svg-icons'
import {jobs as jobEntries} from './data'
import type {FC} from 'react';
import type {Job} from "@/Components/Jobs/data/Job";

const Job: FC<{job: Job}> = ({job}) => <div className={styles.jobWrapper}>
    <div className={styles.header}>

        <div className={styles.logo}>
            <Image src={job.image} fill alt={job.name} />
        </div>
        <h3 className={`${robotoMono.className} ${styles.jobTitle}`}>{job.name}, {job.period.start} {job.period?.end && ` - ${job.period.end}`}: {job.position}</h3>
    </div>

    <div className={styles.jobInfo}>
        {job.paragraphs.map((paragraph, index) => <p key={index} className={robotoMono.className}>{paragraph}</p>)}
    </div>
</div>;

export const Jobs = () => {
    const jobs = useMemo( () => [jobEntries.testim, jobEntries.dreamed, jobEntries.taliaz, jobEntries.realCommerce, jobEntries.gizra], []);

    return <div className={`${styles.jobsWrapper} ${robotoMono.className}`} id='jobs'>
        <div className={styles.timeline}>
            <h3>Jobs</h3>

            <div className={styles.box}>

                <div className={styles.container}>

                    <div className={styles.lines}>
                        <div className={styles.dot}></div>
                        <div className={styles.line}></div>
                        <div className={styles.dot}></div>
                        <div className={styles.line}></div>
                        <div className={styles.dot}></div>
                        <div className={styles.line}></div>
                        <div className={styles.dot}></div>
                        <div className={styles.line}></div>
                    </div>

                    <div className={styles.cards}>
                        <div className={styles.card}>

                            <h4>16:30</h4>
                            <p>Believing Is The Absence<br /> Of Doubt</p>
                        </div>

                        <div className={`${styles.card} ${styles.mid}`}>
                            <h4>15:22</h4>
                            <p>Start With A Baseline</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
}
