package br.com.GCEval.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import java.io.Serializable;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

@Entity
@Table(name = "groupofanswer")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Groupofanswer.findAll", query = "SELECT g FROM Groupofanswer g"),
    @NamedQuery(name = "Groupofanswer.findByIdGroupOfAnswer", query = "SELECT g FROM Groupofanswer g WHERE g.idGroupOfAnswer = :idGroupOfAnswer"),
    @NamedQuery(name = "Groupofanswer.findByName", query = "SELECT g FROM Groupofanswer g WHERE g.name = :name")})
public class Groupofanswer implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idGroupOfAnswer")
    private Integer idGroupOfAnswer;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 100)
    @Column(name = "name")
    private String name;
    @JoinTable(name = "question_has_groupofanswer", joinColumns = {
        @JoinColumn(name = "groupOfAnswer", referencedColumnName = "idGroupOfAnswer")}, inverseJoinColumns = {
        @JoinColumn(name = "question", referencedColumnName = "idQuestion")})
    @ManyToMany
    @JsonIgnore
    private List<Question> questionList;
    @OneToMany(mappedBy = "groupOfAnswer")
    private List<Answer> answerList;

    public Groupofanswer() {
    }

    public Groupofanswer(Integer idGroupOfAnswer) {
        this.idGroupOfAnswer = idGroupOfAnswer;
    }

    public Groupofanswer(Integer idGroupOfAnswer, String name) {
        this.idGroupOfAnswer = idGroupOfAnswer;
        this.name = name;
    }

    public Integer getIdGroupOfAnswer() {
        return idGroupOfAnswer;
    }

    public void setIdGroupOfAnswer(Integer idGroupOfAnswer) {
        this.idGroupOfAnswer = idGroupOfAnswer;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    @XmlTransient
    public List<Question> getQuestionList() {
        return questionList;
    }

    public void setQuestionList(List<Question> questionList) {
        this.questionList = questionList;
    }

    @XmlTransient
    public List<Answer> getAnswerList() {
        return answerList;
    }

    public void setAnswerList(List<Answer> answerList) {
        this.answerList = answerList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idGroupOfAnswer != null ? idGroupOfAnswer.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Groupofanswer)) {
            return false;
        }
        Groupofanswer other = (Groupofanswer) object;
        if ((this.idGroupOfAnswer == null && other.idGroupOfAnswer != null) || (this.idGroupOfAnswer != null && !this.idGroupOfAnswer.equals(other.idGroupOfAnswer))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "br.com.GCEval.model.Groupofanswer[ idGroupOfAnswer=" + idGroupOfAnswer + " ]";
    }

}
