package br.com.GCEval.model;

import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.UniqueConstraint;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;

@Entity
@Table(name = "answerdata", uniqueConstraints={@UniqueConstraint(columnNames={"answer", "question", "section","userAccount"})})
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Answerdata.findAll", query = "SELECT a FROM Answerdata a"),
    @NamedQuery(name = "Answerdata.findByIdAnswerData", query = "SELECT a FROM Answerdata a WHERE a.idAnswerData = :idAnswerData"),
    @NamedQuery(name = "Answerdata.findByUserAnswer", query = "SELECT a FROM Answerdata a WHERE a.userAnswer = :userAnswer"),
    @NamedQuery(name = "Answerdata.findByUserAccount", query = "SELECT a FROM Answerdata a WHERE a.userAccount = :UserAccount")})
public class Answerdata implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idAnswerData")
    private Integer idAnswerData;
    @Size(max = 300)
    @Column(name = "userAnswer")
    private String userAnswer;
    @JoinColumn(name = "answer", referencedColumnName = "idAnswer")
    @ManyToOne
    private Answer answer;
    @JoinColumn(name = "question", referencedColumnName = "idQuestion")
    @ManyToOne(optional = false)
    private Question question;
    @JoinColumn(name = "Section", referencedColumnName = "idSection")
    @ManyToOne(optional = false)
    private Section section;
    @JoinColumn(name = "UserAccount", referencedColumnName = "idUserAccount")
    @ManyToOne(optional = false)
    private Useraccount userAccount;

    public Answerdata() {
    }

    public Answerdata(Integer idAnswerData) {
        this.idAnswerData = idAnswerData;
    }

    public Integer getIdAnswerData() {
        return idAnswerData;
    }

    public void setIdAnswerData(Integer idAnswerData) {
        this.idAnswerData = idAnswerData;
    }

    public String getUserAnswer() {
        return userAnswer;
    }

    public void setUserAnswer(String userAnswer) {
        this.userAnswer = userAnswer;
    }

    public Answer getAnswer() {
        return answer;
    }

    public void setAnswer(Answer answer) {
        this.answer = answer;
    }

    public Question getQuestion() {
        return question;
    }

    public void setQuestion(Question question) {
        this.question = question;
    }

    public Section getSection() {
        return section;
    }

    public void setSection(Section section) {
        this.section = section;
    }

    public Useraccount getUserAccount() {
        return userAccount;
    }

    public void setUserAccount(Useraccount userAccount) {
        this.userAccount = userAccount;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idAnswerData != null ? idAnswerData.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Answerdata)) {
            return false;
        }
        Answerdata other = (Answerdata) object;
        if ((this.idAnswerData == null && other.idAnswerData != null) || (this.idAnswerData != null && !this.idAnswerData.equals(other.idAnswerData))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Answerdata{" + "idAnswerData=" + idAnswerData + ", userAnswer=" + userAnswer + ", answer=" + answer + ", question=" + question + ", section=" + section + ", userAccount=" + userAccount + '}';
    }

    
    

}
