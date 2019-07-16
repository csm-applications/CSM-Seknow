/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.GCEval.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import java.io.Serializable;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

/**
 *
 * @author vini_
 */
@Entity
@Table(name = "question")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Question.findAll", query = "SELECT q FROM Question q"),
    @NamedQuery(name = "Question.findByIdQuestion", query = "SELECT q FROM Question q WHERE q.idQuestion = :idQuestion"),
    @NamedQuery(name = "Question.findByQuestion", query = "SELECT q FROM Question q WHERE q.question = :question")})
public class Question implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idQuestion")
    private Integer idQuestion;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 550)
    @Column(name = "Question")
    private String question;
    @ManyToMany(mappedBy = "questionList")
    private List<Groupofanswer> groupofanswerList;
    @JoinColumn(name = "Section", referencedColumnName = "idSection")
    @ManyToOne(optional = false)
    @JsonIgnore
    private Section section;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "question")
    @JsonIgnore
    private List<Answerdata> answerdataList;

    public Question() {
    }

    public Question(Integer idQuestion) {
        this.idQuestion = idQuestion;
    }

    public Question(Integer idQuestion, String question) {
        this.idQuestion = idQuestion;
        this.question = question;
    }

    public Integer getIdQuestion() {
        return idQuestion;
    }

    public void setIdQuestion(Integer idQuestion) {
        this.idQuestion = idQuestion;
    }

    public String getQuestion() {
        return question;
    }

    public void setQuestion(String question) {
        this.question = question;
    }

    @XmlTransient
    public List<Groupofanswer> getGroupofanswerList() {
        return groupofanswerList;
    }

    public void setGroupofanswerList(List<Groupofanswer> groupofanswerList) {
        this.groupofanswerList = groupofanswerList;
    }

    public Section getSection() {
        return section;
    }

    public void setSection(Section section) {
        this.section = section;
    }

    @XmlTransient
    public List<Answerdata> getAnswerdataList() {
        return answerdataList;
    }

    public void setAnswerdataList(List<Answerdata> answerdataList) {
        this.answerdataList = answerdataList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idQuestion != null ? idQuestion.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Question)) {
            return false;
        }
        Question other = (Question) object;
        if ((this.idQuestion == null && other.idQuestion != null) || (this.idQuestion != null && !this.idQuestion.equals(other.idQuestion))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "br.com.GCEval.model.Question[ idQuestion=" + idQuestion + " ]";
    }
    
}
