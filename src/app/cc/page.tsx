import styles from './cc.module.scss';
export default function CC() {
    return <iframe className={styles.iframe} src="https://celebrity-crush-main-mxuzlo.laravel.cloud/"
                   allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    />
}