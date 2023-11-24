'use client';

import {useMemo, useState} from "react";
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import {jobs as jobEntries} from './data'
import type {Job} from "@/Components/Jobs/data/Job";

export const Jobs = () => {
    const jobs = [
        jobEntries.gizra,
        jobEntries.realCommerce,
        jobEntries.taliaz,
        jobEntries.dreamed,
        jobEntries.testim,
    ];
    const [selectedJob, setSelectedJob] = useState(jobEntries.gizra.id);
    const selectedJobData = useMemo(() => jobs.find(job => job.id === selectedJob) || jobEntries.testim, [jobs, selectedJob]);
    return <div className={`${styles.jobsWrapper} ${robotoMono.className}`} id='jobs'>
        <div className={styles.timeline}>
            <h3>Jobs</h3>

            <div className={styles.box}>
                <div className={styles.container}>
                    <div className={styles.cards}>
                        {jobs.map((job, index) => <div className={styles.card} key={index} onClick={() => setSelectedJob(job.id)}>
                                <div className={`${styles.dot} ${job.id === selectedJob && styles.active}`}></div>
                                <h4>{job.name}</h4>
                                <p>{job.position}, {job.period.start} {job.period.end && `- ${job.period.end}`}</p>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </div>
        <div className={styles.job}>
            <Image src={selectedJobData.image} height={70} alt={selectedJobData.name} />

            <div className={styles.paragraphs}>
                {selectedJobData.paragraphs.map((paragraph, index) => <p key={index}>{paragraph}</p>)}
            </div>
        </div>
    </div>
}
