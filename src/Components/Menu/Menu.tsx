import styles from './menu.module.scss';
import {robotoMono} from "@/common/fonts";

export const Menu = () => <div className={`${styles.menu} ${robotoMono.className}`}>
    <div className={styles.innerMenu}>
        <span className={styles.text}>Home</span>

        <ul>
            <li>Jobs</li>
            <li>Blog posts</li>
        </ul>
    </div>
</div>
